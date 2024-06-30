<?php

/**
 * MODEL CLASS TO GET ALL THE POSTS.
 * 
 * @package SES-Article
 */

namespace inc\models;

use WP_Query;

class Posts
{
    public static function getPosts()
    {
        $args = [
            'post_type'      => 'articles',
            'posts_per_page' => -1
        ];

        $query = new WP_Query($args);
        $posts = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $postData = [
                    'title'       => get_the_title(),
                    'content'     => get_the_content(),
                    'thumbnail'   => get_the_post_thumbnail(get_the_ID(), [800, 450]),
                    'thumbnail_large' => get_the_post_thumbnail(get_the_ID(), 'large'),
                    'siteName'    => get_post_meta(get_the_ID(), '_siteName', true),
                    'siteLogo' => get_post_meta(get_the_ID(), '_siteLogo', true),
                    'redirectUrl' => get_post_meta(get_the_ID(), '_redirectUrl', true),
                    'isFeatured'  => get_post_meta(get_the_ID(), '_isFeatured', true),
                    'postDate' => get_the_date()
                ];
                $posts[] = $postData;
            }
        }
        wp_reset_postdata();
        return $posts;
    }
}
