<?php

/**
 * MODEL CLASS TO HANDLE MEDIA.
 * 
 * @package Ses-Article
 */

namespace inc\models;

class Media
{
    public static function handleMedia($mediaTitle, $mediaUrl, $siteTitle)
    {
        global $wpdb;

        $data = [
            'media_title' => $mediaTitle,
            'media_url' => $mediaUrl
        ];

        $encodeData = json_encode($data);

        $insert = $wpdb->insert(
            $wpdb->prefix . 'ses_media',
            [
                'site_title' => $siteTitle,
                'data' => $encodeData,
                'created_at' => current_time('mysql', true)
            ],
            ['%s', '%s', '%s']
        );

        if ($insert !== false) {
            return $insert;
        }
    }
}
