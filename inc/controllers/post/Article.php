<?php


/**
 * CLASS TO REGISTER ARTICLE SES POST AND HANDLE IT
 * 
 * @package SES-Article
 */

namespace inc\controllers\post;

use inc\controllers\base\Base;

class Article extends Base
{
    /**REGISTER METHOD TO HOOK OTHER METHODS */
    public function register()
    {
        add_action('init', [$this, 'articles']);
    }

    /**METHOD TO REGISTER MOST TYPE. */
    public function articles()
    {
        $labels = [
            'name' => 'Articles',
            'singular_name' => 'Article',
            'menu_name' => 'Articles',
            'name_admin_bar' => 'Article',
            'add_new' => 'Add New Article',
            'add_new_item' => 'Add New Article',
            'new_item' => 'New Article',
            'edit_item' => 'Edit Article',
            'view_item' => 'View Article',
            'all_items' => 'All Articles',
            'search_items' => 'Search Articles',
            'not_found' => 'No Articles found.',
            'not_found_in_trash' => 'No Articles found in Trash.',
            'parent_item_colon' => 'Parent Article:',
            'archives' => 'Article Archives',
            'attributes' => 'Article Attributes',
            'insert_into_item' => 'Insert into Article',
            'uploaded_to_this_item' => 'Uploaded to this Article',
            'featured_image' => 'Featured Image',
            'set_featured_image' => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image' => 'Use as featured image',
            'filter_items_list' => 'Filter Articles list',
            'items_list_navigation' => 'Articles list navigation',
            'items_list' => 'Articles list',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'articles'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon' => 'dashicons-admin-post',
            'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'],
            'show_in_rest' => true,
        ];

        register_post_type('articles', $args);
    }
}
