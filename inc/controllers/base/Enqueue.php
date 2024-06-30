<?php

/**
 * CLASS TO LOAD ASSETS.
 * 
 * @package SES-Article
 */

namespace inc\controllers\base;

class Enqueue extends Base
{
    /**REGISTER METHOD TO HOOK OTHER METHODS */
    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'loadUserAssets']);
        add_action('admin_enqueue_scripts', [$this, 'loadAdminAssets']);
    }


    /**METHOD TO REIGSTER FROM END STYLES */
    public function loadAdminAssets()
    {
        wp_enqueue_style('adminStyles', $this->url . 'assets/css/admin.css');
    }


    /**METHOD TO REGISTER ADMIN STYLES. */
    public function loadUserAssets()
    {
        wp_enqueue_style('userStyles', $this->url . 'assets/css/style.css');
        wp_enqueue_style('slickCss', $this->url . 'vendor/kenwheeler/slick/slick/slick.css');
        wp_enqueue_style('slickThemeCss', $this->url . 'vendor/kenwheeler/slick/slick/slick-theme.css');
        wp_enqueue_script('userScripts', $this->url . 'assets/js/script.js', ['jquery'], '1.0', true);
        wp_enqueue_script('slickScript', $this->url . 'vendor/kenwheeler/slick/slick/slick.min.js');
        wp_enqueue_script('jquery');
    }
}
