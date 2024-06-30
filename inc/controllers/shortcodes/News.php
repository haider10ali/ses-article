<?php

/**
 * CLASS TO DISPLAY POSTS ON HOME PAGE WITH SHORTCODE.
 * 
 * @package SES-Article
 */

namespace inc\controllers\shortcodes;

use inc\models\Posts;
use inc\controllers\base\Base;

class News extends Base
{
    public function register()
    {
        add_shortcode('newsPosts', [$this, 'loadNewsPage']);
    }

    public function loadNewsPage()
    {
        $data = [
            'newsPosts' => Posts::getPosts()
        ];
        $this->loadViews('news/News', $data);
    }
}
