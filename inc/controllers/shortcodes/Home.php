<?php

/**
 * CLASS TO DISPLAY POSTS ON HOME PAGE WITH SHORTCODE.
 * 
 * @package SES-Article
 */

namespace inc\controllers\shortcodes;

use inc\controllers\base\Base;
use inc\models\Posts;

class Home extends Base
{
    public function register()
    {
        add_shortcode('homePosts', [$this, 'loadHomePage']);
    }


    public function loadHomePage()
    {
        $data = [
            'posts' => Posts::getPosts()
        ];
        $this->loadViews('home/Home', $data);
    }
}
