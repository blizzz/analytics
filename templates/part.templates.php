<?php
/**
 * Data Analytics
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author Marcel Scherello <audioplayer@scherello.de>
 * @copyright 2019 Marcel Scherello
 */
?>

<div hidden>
    <div id="templateDataset">
        <div class="table" style="display: table;">
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Report title')); ?></div>
                <div style="display: table-cell;"><input id="sidebarDatasetName" class="input150"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Subheader')); ?></div>
                <div style="display: table-cell;"><input id="sidebarDatasetSubheader" class="input150"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Report group')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarDatasetParent" class="input150">
                        <option value="0"></option>
                    </select>
                </div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell;"><?php p($l->t('Datasource')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarDatasetType" class="input150">
                        <option value="" selected></option>
                        <option value="0"><?php p($l->t('No Data / Group')); ?></option>
                        <option value="1"><?php p($l->t('Local File')); ?></option>
                        <option value="2"><?php p($l->t('Internal Database')); ?></option>
                        <option value="3"><?php p($l->t('GitHub')); ?></option>
                        <option value="4"><?php p($l->t('External url (csv)')); ?></option>
                    </select>
                </div>
            </div>
            <div id="datasetLinkRow" style="display: table-row;">
                <div style="display: table-cell;"><?php p($l->t('Options')); ?></div>
                <div style="display: table-cell;"><input id="sidebarDatasetLink" disabled class="input150">
                    <button id="sidebarDatasetLinkButton" type="button" class="icon-rename">
                        <?php //p($l->t('Edit')); ?>
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div id="datasetDimensionSectionHeader"><h3><?php p($l->t('Column headers')); ?></h3></div>
        <div id="datasetDimensionSection" class="table" style="display: table;">
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Column')); ?>&nbsp;1</div>
                <div style="display: table-cell;"><input id="sidebarDatasetDimension1" class="input150"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Column')); ?>&nbsp;2</div>
                <div style="display: table-cell;"><input id="sidebarDatasetDimension2" class="input150"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Column')); ?>&nbsp;3</div>
                <div style="display: table-cell;"><input id="sidebarDatasetDimension3" class="input150"></div>
            </div>
        </div>
        <br>
        <div id="datasetVisualizationSectionHeader"><h3><?php p($l->t('Visualization')); ?></h3></div>
        <div id="datasetVisualizationSection" class="table" style="display: table;">
            <div style="display: table-row;">
                <div style="display: table-cell; width: 120px;"><?php p($l->t('Display')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarDatasetVisualization" class="input150">
                        <option value="ct" selected><?php p($l->t('Chart') . ' & ' . $l->t('Table')); ?></option>
                        <option value="table"><?php p($l->t('Table')); ?></option>
                        <option value="chart"><?php p($l->t('Chart')); ?></option>
                    </select>
                </div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell;"><?php p($l->t('Chart Type')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarDatasetChart" class="input150">
                        <option value="" selected></option>
                        <option value="line"><?php p($l->t('Line')); ?></option>
                        <option value="datetime"><?php p($l->t('Timeline (Date in column 2)')); ?></option>
                        <option value="column"><?php p($l->t('Columns')); ?></option>
                        <option value="area"><?php p($l->t('Area')); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button id="sidebarDatasetUpdateButton" type="button">
            <?php p($l->t('Update Report')); ?>
        </button>
        <button id="sidebarDatasetDeleteButton" type="button">
            <?php p($l->t('Delete Report')); ?>
        </button>
    </div>
    <div id="templateData">
        <div><h3><?php p($l->t('Manual entry')); ?></h3></div>
        <div class="table" style="display: table;">
            <div style="display: table-row;">
                <div id="DataTextDimension1"
                     style="display: table-cell; width: 120px;"><?php p($l->t('Object')); ?></div>
                <div style="display: table-cell;"><input id="DataDimension1"></div>
            </div>
            <div style="display: table-row;">
                <div id="DataTextDimension2" style="display: table-cell; width: 120px;"><?php p($l->t('Date')); ?></div>
                <div style="display: table-cell;"><input id="DataDimension2"></div>
            </div>
            <div style="display: table-row;">
                <div id="DataTextDimension3"
                     style="display: table-cell; width: 120px;"><?php p($l->t('Value')); ?></div>
                <div style="display: table-cell;"><input id="DataDimension3"></div>
            </div>
        </div>
        <br>
        <button id="updateDataButton" type="button">
            <?php p($l->t('Save Data')); ?>
        </button>
        <button id="deleteDataButton" type="button">
            <?php p($l->t('Delete Data')); ?>
        </button>
        <br>
        <br>
        <div><h3><?php p($l->t('Import')); ?></h3></div>
        <button id="importDataFileButton" type="button">
            <?php p($l->t('From File')); ?>
        </button>
        <button id="importDataClipboardButton" type="button">
            <?php p($l->t('From Clipboard')); ?>
        </button>
        <br>
        <textarea id="importDataClipboardText" rows="5" cols="50" hidden></textarea>
        <br>
        <button id="importDataClipboardButtonGo" type="button" hidden>
            <?php p($l->t('Import')); ?>
        </button>
        <div><h3><?php p($l->t('REST API')); ?></h3></div>
        <div id="apiLink" class="clipboard-button icon icon-clippy" style="width: 20px;"></div>
        <br>
        <div><h3><?php p($l->t('Datasloads')); ?></h3></div>
        <button id="advancedButton" type="button">
            <?php p($l->t('Advanced Configuration')); ?>
        </button>
    </div>
    <div id="templateThreshold">
        <div><h1><?php p($l->t('Thresholds can trigger notifications and color coding in reports')); ?></h1>
        </div>
        <br>
        <div class="table" style="display: table;">
            <div style="display: table-row;">
                <div id="sidebarThresholdTextDimension1"
                     style="display: table-cell; width: 120px;"><?php p($l->t('Object')); ?></div>
                <div style="display: table-cell;"><input id="sidebarThresholdDimension1" class="input150"
                                                         placeholder="<?php p($l->t('single value or *')); ?>"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell;"><?php p($l->t('Option')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarThresholdOption" class="input150">
                        <option value="=" selected><?php p($l->t('= equal')); ?></option>
                        <option value=">"><?php p($l->t('> greater')); ?></option>
                        <option value="<"><?php p($l->t('< less')); ?></option>
                        <option value="<="><?php p($l->t('<= less equal')); ?></option>
                        <option value=">="><?php p($l->t('>= greater equal')); ?></option>
                        <option value="!="><?php p($l->t('!= not equal')); ?></option>
                    </select>
                </div>
            </div>
            <div style="display: table-row;">
                <div id="sidebarThresholdTextDimension3"
                     style="display: table-cell; width: 120px;"><?php p($l->t('Value')); ?></div>
                <div style="display: table-cell;"><input id="sidebarThresholdDimension3" class="input150"></div>
            </div>
            <div style="display: table-row;">
                <div style="display: table-cell;"><?php p($l->t('Severity')); ?></div>
                <div style="display: table-cell;">
                    <select id="sidebarThresholdSeverity" class="input150">
                        <option value="1" selected><?php p($l->t('Notification')); ?></option>
                        <option value="2"><?php p($l->t('red')); ?></option>
                        <option value="3"><?php p($l->t('yellow')); ?></option>
                        <option value="4"><?php p($l->t('green')); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button id="createThresholdButton" type="button">
            <?php p($l->t('Save Threshold')); ?>
        </button>
        <br>
        <br>
        <div id="sidebarThresholdList"></div>
    </div>
    <div id="templateDataload">
        <div style="display: flex;">
            <div style="width: 30%;">
                <div class="wizzardHeader">Available Datasources</div>
                <div id="dataloadList"></div>
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <div id="createDataloadButton" class="icon-add icon" style="padding: 0 0px 0 44px;">
                        </div>
                    </div>
                    <div style="display: table-cell;">
                        <select id="dataloadType" class="input150">
                            <option value="1" selected><?php p($l->t('Local File')); ?></option>
                            <option value="3"><?php p($l->t('GitHub')); ?></option>
                            <option value="4"><?php p($l->t('External url (csv)')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="width: 5%;">
                <div class="wizzardHeader icon-view-next"></div>
            </div>
            <div style="width: 30%;">
                <div class="wizzardHeader">Settings</div>
                <div id="dataloadDetail">
                    <div id="dataloadDetailHeader" hidden>
                        <div class="input150" style="display: inline-flex;">Title</div>
                        <input class="input150" id="dataloadName" style="display: inline-flex;">
                    </div>
                    <br>
                    <div id="dataloadDetailItems">
                    </div>
                    <div id="dataloadDetailButtons" hidden>
                        <button id="dataloadDeleteButton">Delete</button>
                        <button id="dataloadUpdateButton">Save</button>
                    </div>
                </div>
            </div>
            <div style="width: 5%;">
                <div class="wizzardHeader icon-view-next"></div>
            </div>
            <div style="width: 30%;">
                <div class="wizzardHeader">Run</div>
                <div id="dataloadRun" hidden>
                    <span><?php p($l->t('Manual dataload')); ?></span>
                    <br>
                    <button id="dataloadExecuteButton">Execute now</button>
                    <input type="checkbox" id="testrunCheckbox" class="checkbox" checked><label
                            for="testrunCheckbox">Testrun</label>
                    <br><br>
                    <span><?php p($l->t('Schedule dataload in background')); ?></span>
                    <select id="dataloadSchedule" class="input150">
                        <option value="" selected><?php p($l->t('not scheduled')); ?></option>
                        <option value="d"><?php p($l->t('daily')); ?></option>
                        <option value="h"><?php p($l->t('hourly')); ?></option>
                    </select>
                    <button id="dataloadScheduleButton">Save</button>
                    <br><br>
                    <button disabled="">Use in Flow</button>
                </div>
            </div>
        </div>

    </div>
</div>