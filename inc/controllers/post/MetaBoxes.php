<?php

/**
 * CLASS TO ADD META BOXES TO POST.
 * 
 * @package SES-Article
 */

namespace inc\controllers\post;

class MetaBoxes
{
    public function register()
    {
        add_action('add_meta_boxes', [$this, 'addArticleMetaBoxes']);
        add_action('save_post', [$this, 'saveMetaData']);
    }

    /**METHOD TO ADD CUSTOM META BOXES. */
    public function addArticleMetaBoxes()
    {
        add_meta_box(
            'article_meta_box',
            'Article Fields',
            [$this, 'renderArticleFields'],
            'articles',
            'normal',
            'default'
        );
    }

    /** METHOD TO RENDER CUSTOM CUSTOM FIELDS. */
    public function renderArticleFields($post)
    {
        /** RETRIVE THE VALUES OF CUSTOM FIELDS */
        $siteName = get_post_meta($post->ID, '_siteName', true);
        $siteLogo = get_post_meta($post->ID, '_siteLogo', true);
        $redirectUrl = get_post_meta($post->ID, '_redirectUrl', true);
        $isFeatured = get_post_meta($post->ID, '_isFeatured', true);


        echo '<div class="articles__custom__fields">';

        /**SITE NAME INPUT. */
        echo '<input type="text" name="siteName" id="siteName" placeholder="Enter site name" value="' . esc_html($siteName) . '"><br>';

        /** SITE LOGO IMAGE */
        echo '<input type="file" name="siteLogo" id="siteLogo" accept=".webp, .jpg, .jpeg, .png" value=""><br>';
        if ($siteLogo) {
            echo '<span>Current Logo: ' . esc_url($siteLogo) . '</span><br>';
        }

        /** READ MORE URL INPUT */
        echo '<input type="url" name="redirectUrl" id="redirectUrl" placeholder="Enter read more url" value="' . esc_url($redirectUrl) . '"><br>';

        /** FEATURED OR UNFEATURED */
        echo '<label for="isFeatured">Is Featured ?</label><br>';
        echo '<select name="isFeatured" id="isFeatured" class="ses__custom__fields">
          <option value=' . esc_html($isFeatured) . ' disabled selected>' . esc_html($isFeatured) . '></option>;
          <option value="featured">Featured</option>;
          <option value="un-featured">Un-featured</option>;
        </select>';
        echo '</div>';
    }


    /** SAVE CUSTOM META DATA. */
    public function saveMetaData($postId)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        /** CHECK THE USER PERMISSION. */
        if (!current_user_can('edit_post', $postId)) return;


        /** SANITIZE THE CUSTOM FIELDS */
        $siteName = isset($_POST['siteName']) ? sanitize_text_field($_POST['siteName']) : '';
        $redirectUrl = isset($_POST['redirectUrl']) ? esc_url_raw($_POST['redirectUrl']) : '';
        $isFeatured = isset($_POST['isFeatured']) ? sanitize_text_field($_POST['isFeatured']) : '';
        /** SITE LOGO */
        if (!empty($_FILES['siteLogo']['name'])) {
            $file = $_FILES['siteLogo'];

            /** USE WORDPRESS FUNCTION TO HANDLE UPLOAD. */
            $upload = wp_handle_upload($file, ['test_form' => false]);
            if (isset($upload['url'])) {
                $siteLogo = $upload['url'];
                update_post_meta($postId, '_siteLogo', $siteLogo);
            
        } else {
            $siteLogo = get_post_meta($postId, '_siteLogo', true);
        }

        /** UPDATE POST META. */
        update_post_meta($postId, '_siteName', $siteName);
        update_post_meta($postId, '_redirectUrl', $redirectUrl);
        update_post_meta($postId, '_isFeatured', $isFeatured);
    }
}
