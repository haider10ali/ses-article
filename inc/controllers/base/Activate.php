<?php

/**
 * PLUGIN ACTIVATION CLASS.
 * 
 *  @package SES-Article
 */

namespace inc\controllers\base;


class Activate
{
    public static function activate()
    {
        self::createMediaTable();
        flush_rewrite_rules();
    }

    private static function createMediaTable()
    {
        global $wpdb;

        $tableName = $wpdb->prefix  . "ses_media";

        if ($wpdb->get_var("SHOW TABLES LIKE '$tableName'") != $tableName) {

            $sql = "CREATE TABLE $tableName (
                id INT NOT NULL AUTO_INCREMENT,
                site_title VARCHAR(255) NOT NULL,
                data TEXT DEFAULT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) COLLATE {$wpdb->collate}";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
}
