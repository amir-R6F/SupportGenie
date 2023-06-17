<?php


defined("ABSPATH" || exit());

class MED_DB
{


    public static function create_table()
    {
        global $wpdb;

        $Tickets = $wpdb->prefix . 'MED_Tickets';
        $ChatRoom = $wpdb->prefix . 'med_chatroom';


        $charset = $wpdb->get_charset_collate();


        $Tickets_sql = "CREATE TABLE IF NOT EXISTS `" . $Tickets . "` (
                `ID` bigint(20) NOT NULL AUTO_INCREMENT,
                `issue` varchar(256) NOT NUll,
                `department` varchar(256) NOT NULL,
                `related_service` varchar(256),
                `priority` varchar(32) NOT NULL,
                `description` TEXT,
                `creator_id` bigint(20) NOT NULL,
                `tkt_number` varchar(256),
                `state` BOOLEAN DEFAULT 0,
                `CREATED_AT` TIMESTAMP DEFAULT now(),
                PRIMARY KEY (`ID`))
                ENGINE=InnoDB " . $charset . ";";

        $ChatRoom_sql = "CREATE TABLE IF NOT EXISTS `" . $ChatRoom . "` (
                `ID` bigint(20) NOT NULL AUTO_INCREMENT,
                `tkt_id` int NOT NUll,
                `user_id` int NOT NULL,
                `message` text,
                `CREATED_AT` TIMESTAMP DEFAULT now(),
                PRIMARY KEY (`ID`))
                ENGINE=InnoDB " . $charset . ";";


        if (!function_exists('dbDelta')) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        dbDelta($Tickets_sql);
        dbDelta($ChatRoom_sql);


    }
}