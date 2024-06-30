<?php

/**
 * CLASS TO REGISTER A DASHBOARD ADMIN PAGE.
 * 
 * @package Ses-Article
 */

namespace inc\controllers\admin;
use inc\controllers\admin\callback\ProcessMedia;

class Page
{
    public $processMedia;

    public function register()
    {
        $this->processMedia = new ProcessMedia();
        add_action('admin_menu', [$this, 'addDashboardPage']);
    }

    public function addDashboardPage()
    {
        add_menu_page(
            'SES',
            'SES',
            'manage_options',
            'ses',
            [$this->processMedia, 'sesPage'],
            'dashicons-admin-generic',
            26
        );
    }
}
