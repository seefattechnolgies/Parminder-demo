<?php



function mow_uninstall() {

    global $wpdb;

    $table_name = $wpdb->prefix . "mowplayer_accounts";
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);

    $table_name = $wpdb->prefix . "mowplayer_videos";
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}
