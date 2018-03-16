<?php

namespace Oxboot\Framework\OxbootAdmin;

/**
 * Creates the submenu item for the plugin.
 *
 * Registers a new menu item under 'Tools' and uses the dependency passed into
 * the constructor in order to display the page corresponding to this menu item.
 *
 */

class Submenu {

    private $submenu_page;

    public function __construct( $submenu_page ) {
        $this->submenu_page = $submenu_page;
    }

    public function init() {
        add_action('admin_menu', [$this, 'add_options_page']);
    }

    public function add_options_page() {
        add_options_page(
            'Oxboot Administration Page',
            'Oxboot Administration Page',
            'oxboot_options',
            'oxboot-admin-page',
            [$this->submenu_page, 'render']
        );
    }
}
