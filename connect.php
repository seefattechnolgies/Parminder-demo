<?php

function mow_check_login() {

    global $wpdb;

    $table_name = $wpdb->prefix . "mowplayer_accounts";

    if (!empty($_GET['token'])) {

        $token = sanitize_text_field($_GET['token']);

        $wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, token) VALUES(1,%s) ON DUPLICATE KEY UPDATE token=%s",array($token, $token)));
        mow_update_videos();
    }

    echo '<script>window.close()</script>';
}

/**
 * Fetch and add/update video detail
 */
function mow_update_videos() {

    global $wpdb;

    $account = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "mowplayer_accounts WHERE id = 1 LIMIT 1;");

    $wpdb->query($wpdb->prepare("TRUNCATE TABLE " . $wpdb->prefix . "mowplayer_videos",[]));

    $result = wp_remote_get(MOW_VIDEO_API . $account->token, array('sslverify' => false));
    
    if (!empty($result['body'])) {

        $response = json_decode($result['body'], true);

        if (isset($response['status']) && $response['status'] == 200 && is_array($response['data'])) {
            $allowed_fields = array(
                'category',
                'code',
                'title',
                'description',
                'autoplay',
                'duration',
                'thumbnail',
            );
            foreach ($response['data'] as $video) {
                $values = array_values($video);
                $values[] = $video['code'];
                $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'mowplayer_videos (' . ( implode(', ', $allowed_fields)) . ") VALUES (%s,%s,%s,%s,%s,%s,%s) ON DUPLICATE KEY UPDATE code=%s", $values));
            }
        }
    }
}

function mow_refresh_videos() {
    
}
