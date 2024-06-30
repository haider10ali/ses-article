<?php 

/**
 * PLUGIN DEACTIVATION CLASS.
 * 
 *  @package SES-Article
 */

 namespace inc\controllers\base;


class Deactivate 
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}