<?php

/**
 * CONTROLLER CALLBACK CLASS FOR THE DASHBOARD PAGE.
 * 
 * @package Ses-Article
 */

namespace inc\controllers\admin\callback;

use inc\models\Media;
use inc\controllers\base\Base;

class ProcessMedia extends Base
{
    public function sesPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['addMedia'])) {
                $this->processMedia();
            }
        }
        $this->loadViews('admin/Ses');
    }

    /** PROCESS AND VALIDATE FORM */
    public function processMedia()
    {
        if (isset($_POST['nonce_field_recent_media_courage']) && wp_verify_nonce($_POST['nonce_field_recent_media_courage'], 'nonce_action_recent_media_courage')) {
            $siteTitle = isset($_POST['siteTitle']) ? sanitize_text_field($_POST['siteTitle']) : '';
            $mediaTitle = isset($_POST['mediaTitle']) ? sanitize_text_field($_POST['mediaTitle']) : '';
            $mediaUrl = isset($_POST['mediaUrl']) ? esc_url_raw($_POST['mediaUrl']) : '';

            /** CHECK FOR EMPTY FIELDS */
            if ($mediaTitle === '' || $mediaUrl === '' || $siteTitle === '') {
                $this->addMessage('Please fill out all the fields', 'ses__empty__fields', 'error');
                return;
            }

            /** CALL MODEL METHOD. */
            $insert = Media::handleMedia($mediaTitle, $mediaUrl, $siteTitle);

            if ($insert) {
                $this->addMessage("Media with the site title $siteTitle has been added successfully", 'media__added', 'success');
                return true;
            } else {
                $this->addMessage("Failed to add media with the site title $siteTitle. Please try again later", 'media__failed', 'error');
                return;
            }
        } else {
            $this->addMessage('Nonce verification failed. Please try again later', 'ses__nonce__failed', 'error');
            return;
        }
    }

    /** PRIVATE METHOD TO ADD ERRORS */
    private function addMessage(string $message, string $code, string $messageName)
    {
        add_settings_error('ses', $code, $message, $messageName);
    }
}
