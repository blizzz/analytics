/**
 * Data Analytics
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author Marcel Scherello <audioplayer@scherello.de>
 * @copyright 2019 Marcel Scherello
 */
/** global: OCA */
/** global: OCP */
/** global: OC */
'use strict';

/**
 * @namespace OCA.Analytics.Navigation
 */
OCA.Analytics.Navigation = {

    init: function (datasetId) {
        document.getElementById('navigationDatasets').innerHTML = '';
        OCA.Analytics.Backend.getDatasets(datasetId);
    },

    handleNewDatasetButton: function () {
        OCA.Analytics.Backend.createDataset();
    },

    createDemoReport: function () {
        OCA.Analytics.Backend.createDataset('DEMO');
    },

    buildNavigation: function (data) {
        for (let navigation of data) {
            OCA.Analytics.Navigation.buildNavigationRow(navigation);
        }
    },

    buildNavigationRow: function (data) {
        let li = document.createElement('li');
        let typeIcon;

        let a = document.createElement('a');
        a.setAttribute('href', '#/r/' + data.id);
        let typeINT = parseInt(data.type);
        if (typeINT === OCA.Analytics.TYPE_INTERNAL_FILE) {
            typeIcon = 'icon-file';
        } else if (typeINT === OCA.Analytics.TYPE_INTERNAL_DB) {
            typeIcon = 'icon-projects';
        } else if (typeINT === OCA.Analytics.TYPE_GIT || typeINT === OCA.Analytics.TYPE_EXTERNAL_FILE) {
            typeIcon = 'icon-external';
        } else if (typeINT === OCA.Analytics.TYPE_SHARED) {
            if (document.getElementById('config').value === 'true') {
                // don´t show shared reports in advanced config mode as no config is possible
                return;
            }
            typeIcon = 'icon-shared';
        } else if (typeINT === OCA.Analytics.TYPE_EMPTY_GROUP) {
            typeIcon = 'icon-folder';
            li.classList.add('collapsible');
        } else {
            typeIcon = '';
        }

        if (typeIcon) {
            a.classList.add(typeIcon);
        }
        a.innerText = data.name;
        a.dataset.id = data.id;
        a.dataset.type = data.type;
        a.dataset.name = data.name;


        let ulSublist = document.createElement('ul');
        ulSublist.id = 'dataset-' + data.id;

        li.appendChild(a);
        if (typeINT !== OCA.Analytics.TYPE_SHARED) {
            let divUtils = OCA.Analytics.Navigation.buildNavigationUtils(data);
            let divMenu = OCA.Analytics.Navigation.buildNavigationMenu(data);
            li.appendChild(divUtils);
            li.appendChild(divMenu);
        }

        if (data.type === OCA.Analytics.TYPE_EMPTY_GROUP) {
            li.appendChild(ulSublist);
            a.addEventListener('click', OCA.Analytics.Navigation.handleGroupClicked);
        } else {
            a.addEventListener('click', OCA.Analytics.Navigation.handleNavigationClicked);
        }

        let categoryList;
        if (parseInt(data.parent) !== 0) {
            categoryList = document.getElementById('dataset-' + data.parent);
        } else {
            categoryList = document.getElementById('navigationDatasets');
        }
        categoryList.appendChild(li);
    },

    buildNavigationUtils: function (data) {
        let divUtils = document.createElement('div');
        divUtils.classList.add('app-navigation-entry-utils');
        let ulUtils = document.createElement('ul');

        if (document.getElementById('config').value === 'true') {
            if (data.schedules && parseInt(data.schedules) !== 0) {
                let liScheduleButton = document.createElement('li');
                liScheduleButton.classList.add('app-navigation-entry-utils-menu-button');
                let ScheduleButton = document.createElement('button');
                ScheduleButton.classList.add('icon-history', 'toolTip');
                ScheduleButton.setAttribute('title', t('analytics', 'scheduled dataload'));
                liScheduleButton.appendChild(ScheduleButton);
                ulUtils.appendChild(liScheduleButton);
            }
            if (data.dataloads && parseInt(data.dataloads) !== 0) {
                let liScheduleButton = document.createElement('li');
                liScheduleButton.classList.add('app-navigation-entry-utils-menu-button');
                let ScheduleButton = document.createElement('button');
                ScheduleButton.classList.add('icon-category-workflow', 'toolTip');
                ScheduleButton.setAttribute('title', t('analytics', 'dataload available'));
                liScheduleButton.appendChild(ScheduleButton);
                ulUtils.appendChild(liScheduleButton);
            }
        }

        let liMenuButton = document.createElement('li');
        liMenuButton.classList.add('app-navigation-entry-utils-menu-button');
        let button = document.createElement('button');
        button.addEventListener('click', OCA.Analytics.Navigation.handleOptionsClicked);
        button.dataset.id = data.id;
        button.dataset.name = data.name;
        button.dataset.type = data.type;
        liMenuButton.appendChild(button);
        ulUtils.appendChild(liMenuButton);
        divUtils.appendChild(ulUtils);

        return divUtils;
    },

    buildNavigationMenu: function (data) {
        let divMenu = document.createElement('div');
        divMenu.classList.add('app-navigation-entry-menu');
        let ulMenu = document.createElement('ul');

        let liEdit = document.createElement('li');
        let aEdit = document.createElement('a');
        aEdit.href = '#';
        let spanEditIcon = document.createElement('span');
        spanEditIcon.classList.add('icon-rename');
        let spanEditText = document.createElement('span');
        spanEditText.innerText = 'Edit';
        aEdit.appendChild(spanEditIcon);
        aEdit.appendChild(spanEditText);
        liEdit.appendChild(aEdit);
        ulMenu.appendChild(liEdit);

        let liAdvanced = document.createElement('li');
        let aAdvanced = document.createElement('a');
        aAdvanced.href = '#';
        let spanAdvancedIcon = document.createElement('span');
        spanAdvancedIcon.classList.add('icon-category-customization');
        let spanAdvancedText = document.createElement('span');
        spanAdvancedText.innerText = 'Advanced';
        aAdvanced.appendChild(spanAdvancedIcon);
        aAdvanced.appendChild(spanAdvancedText);
        liAdvanced.appendChild(aAdvanced);
        ulMenu.appendChild(liAdvanced);
        divMenu.appendChild(ulMenu);

        return divMenu;
    },

    handleNavigationClicked: function (evt) {
        let activeCategory = document.querySelector('#navigationDatasets .active');
        if (evt) {
            if (activeCategory) {
                activeCategory.classList.remove('active');
            }
            evt.target.classList.add('active');
        }
        if (document.getElementById('config').value === 'true') {
            OCA.Analytics.Sidebar.showSidebar(evt);
            evt.stopPropagation();
        } else {
            OCA.Analytics.UI.resetContent();
            OCA.Analytics.Sidebar.hideSidebar();
            OCA.Analytics.Backend.getData();
        }
    },

    handleOptionsClicked: function (evt) {
        OCA.Analytics.Sidebar.showSidebar(evt);
        evt.stopPropagation();
    },

    handleGroupClicked: function (evt) {
        if (evt.target.parentNode.classList.contains('open')) {
            evt.target.parentNode.classList.remove('open');
        } else {
            evt.target.parentNode.classList.add('open');
        }
        evt.stopPropagation();
    },
};