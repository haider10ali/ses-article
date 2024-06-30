<?php

/**
 * CLASS TO ADD A NEW COLUMNS TO ARTICLE POSTS
 * 
 * @package SES-Article
 */

namespace inc\controllers\post;

class Column
{

    public function register()
    {
        add_filter('manage_articles_posts_columns', [$this, 'addColumnToArticles']);
        add_action('manage_articles_posts_custom_column', [$this, 'ColumnValue'], 10, 2);
    }

    public function addColumnToArticles($columns)
    {
        $columns['is_featured'] = "Post Status";
        return $columns;
    }

    public function ColumnValue($column, $postId)
    {
        if ($column === 'is_featured') {
            $isFeatured = get_post_meta($postId, '_isFeatured', true);
            echo esc_html($isFeatured);
        }
    }
}
