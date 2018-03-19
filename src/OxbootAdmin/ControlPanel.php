<?php

namespace Oxboot\Framework\OxbootAdmin;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Compilers\Compiler;

/**
 * Creates the submenu item for the plugin.
 *
 * Registers a new menu item under 'Tools' and uses the dependency passed into
 * the constructor in order to display the page corresponding to this menu item.
 *
 */

class ControlPanel {

    public function init() {
        add_action('admin_menu', [$this, 'add_oxboot_menu_page']);
    }

    public function add_oxboot_menu_page() {
        add_menu_page(
            'Oxboot Control Panel',
            'Oxboot',
            'manage_options',
            'oxboot-control-panel',
            [$this, 'print_oxboot_control_panel'],
            'dashicons-welcome-view-site',
            4
        );
    }

    function print_oxboot_control_panel() {
        echo app('view');
    }
}
