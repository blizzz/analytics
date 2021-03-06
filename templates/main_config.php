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

use OCP\Util;

Util::addStyle('analytics', 'style');
Util::addStyle('analytics', 'config');
Util::addStyle('analytics', 'sharetabview');
Util::addScript('analytics', 'app');
Util::addScript('analytics', 'sidebar');
Util::addScript('analytics', 'navigation');
Util::addScript('analytics', 'config');
?>

    <div id="app-navigation">
        <?php print_unescaped($this->inc('part.navigation')); ?>
    </div>

    <div id="app-content">
        <div id="loading">
            <i class="ioc-spinner ioc-spin"></i>
        </div>
        <?php print_unescaped($this->inc('part.content_config')); ?>
    </div>
<?php print_unescaped($this->inc('part.templates')); ?>