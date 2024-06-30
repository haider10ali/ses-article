<?php

/**
 * @package SES-Article
 * 
 * Plugin Name: SES-Article
 * Description: SES-Article handler
 * Version: 1.0
 * Author: cybrok-dev
 * Author URI: https://example.com
 * License: MIT
 * Text-Domain: SES-Article
 */

defined('ABSPATH') or die("hey silly humen. You are not allowed to access this file");


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


/**
 * THE CODE RUNS ON PLUGIN ACTIVATION
 */
function activateSes()
{
    inc\controllers\base\Activate::activate();
}
register_activation_hook(__FILE__, 'activateSes');


/**
 * THE CODE THAT RUNS ON PLUGIN DEACTIVATION.
 */
function deactivateSes()
{
    inc\controllers\base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivateSes');

/**
 * LOAD THE INIT CLASS HERE.
 */
if (class_exists('inc\\Initialize')) {
    inc\Initialize::registerServices();
}