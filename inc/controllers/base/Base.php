<?php

/**
 * BASE CLASS TO HANDLE CORE FUNCTIONALITIES.
 * 
 * @package SES-Article
 */

 namespace inc\controllers\base;


class Base
{
    public $path;
    public $url;
    public $name;

    /**
     * CONSTRUCT METHOD.
     */
    public function __construct()
    {
        $this->path = plugin_dir_path(dirname(__FILE__, 2));
        $this->url = plugin_dir_url(dirname(__FILE__, 3));
        $this->name = plugin_basename(dirname(__FILE__, 3)) . '/ses-article.php';
    }

    public function loadViews($view, $data = [])
    {
        extract($data);
        require_once "$this->path/views/$view.php";
    }
}
