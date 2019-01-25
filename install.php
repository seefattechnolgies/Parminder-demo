<?php
/**
 * This function is called when plugin is installed and create required database tables
 * @global Object $wpdb
 */
function mow_install() {

    global $wpdb;

		$table_name = $wpdb->prefix . "mowplayer_accounts";

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE  IF NOT EXISTS $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				name VARCHAR(128) DEFAULT NULL,
				thumbnail VARCHAR(128) DEFAULT NULL,	  
				token VARCHAR(128) NOT NULL UNIQUE,
				PRIMARY KEY  (id)
			  ) $charset_collate;";


		$table_name = $wpdb->prefix . "mowplayer_videos";

		$videosSql = "CREATE TABLE IF NOT EXISTS $table_name (
						id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
						category varchar(128) DEFAULT NULL,
						code varchar(128) NOT NULL,
						title varchar(191) DEFAULT NULL,
						description TEXT DEFAULT NULL,
						thumbnail varchar(191) DEFAULT NULL,
						autoplay tinyint(1) NOT NULL DEFAULT '0',
						duration varchar(10) DEFAULT '00:00',
						PRIMARY KEY (id)
					)$charset_collate;";

		$table_name = $wpdb->prefix . "mow_player_postions";
	 
		$position_sql = "CREATE TABLE  IF NOT EXISTS $table_name (
							id int(11) NOT NULL AUTO_INCREMENT,
							position_id VARCHAR(128) DEFAULT NULL,
							name VARCHAR(128) DEFAULT NULL,
							behavior VARCHAR(128) DEFAULT NULL,	  
							status VARCHAR(128) DEFAULT NULL,	  
							action VARCHAR(128) DEFAULT NULL,	  
							links_update_url VARCHAR(128) DEFAULT NULL,	  
							links_update_method VARCHAR(128) DEFAULT NULL,	  
							links_delete_url VARCHAR(128) DEFAULT NULL,	  
							links_delete_method VARCHAR(128) DEFAULT NULL,	  
							PRIMARY KEY  (id)
						) $charset_collate;";
			  
			  
			$table_name = $wpdb->prefix."mow_player_playlist";  
			  $playlist_sql = "CREATE TABLE  $table_name  (
							id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
							playlist_id int(11) NOT NULL,
							name varchar(255) NOT NULL,
							description varchar(255) NOT NULL,
							status varchar(255) NOT NULL,
							theme varchar(255) NOT NULL,
							position varchar(255) NOT NULL,
							created_date varchar(255) NOT NULL,
							created_timezone_type varchar(255) NOT NULL,
							created_timezone varchar(255) NOT NULL,
							updated_date varchar(255) NOT NULL,
							updated_timezone_type varchar(255) NOT NULL,
							updated_timezone varchar(255) NOT NULL,
							site_id varchar(255) NOT NULL,
							links_update_url varchar(255) NOT NULL,
							links_update_method varchar(255) NOT NULL,
							links_delete_url varchar(255) NOT NULL,
							links_delete_method varchar(255) NOT NULL,
							links_action varchar(255) NOT NULL
						)$charset_collate;";
						
		$table_name = $wpdb->prefix . "mow_player_video_articles";
	
		$articles_sql = "CREATE TABLE  $table_name  (
							id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
							article_id int(11) NOT NULL,
							name varchar(255) NOT NULL,
							category varchar(255) NOT NULL,
							site_id varchar(255) NOT NULL,
							theme varchar(255) NOT NULL,
							async varchar(255) NOT NULL,
							created_date varchar(255) NOT NULL,
							created_timezone_type varchar(255) NOT NULL,
							created_timezone varchar(255) NOT NULL,
							updated_date varchar(255) NOT NULL,
							updated_timezone_type varchar(255) NOT NULL,
							updated_timezone varchar(255) NOT NULL,
							links_update_url varchar(255) NOT NULL,
							links_update_method varchar(255) NOT NULL,
							links_delete_url varchar(255) NOT NULL,
							links_delete_method varchar(255) NOT NULL,
							links_action varchar(255) NOT NULL
						)$charset_collate;";
	
		$table_name = $wpdb->prefix ."mow_player_videos";	
	
		$videos_sql ="CREATE TABLE $table_name (
						id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						video_id int(11) NOT NULL,
						site_id varchar(255) NOT NULL,
						category_id varchar(255) NOT NULL,
						category_name varchar(255) NOT NULL,
						code varchar(255) NOT NULL,
						title varchar(255) NOT NULL,
						site varchar(255) NOT NULL,
						description varchar(255) NOT NULL,
						autoplay varchar(255) NOT NULL,
						thumbnail_jpg varchar(255) NOT NULL,
						thumbnail_gif varchar(255) NOT NULL,
						duration_seconds varchar(255) NOT NULL,
						duration_hhmm varchar(255) NOT NULL,
						video_size varchar(255) NOT NULL,
						video_article_title varchar(255) NOT NULL,
						video_article_description varchar(255) NOT NULL,
						video_article_url varchar(255) NOT NULL,
						status varchar(100) NOT NULL,
						created_date varchar(255) NOT NULL,
						created_timezone_type varchar(255) NOT NULL,
						created_timezone varchar(255) NOT NULL,
						updated_date varchar(255) NOT NULL,
						updated_timezone_type varchar(255) NOT NULL,
						updated_timezone varchar(255) NOT NULL,
						links_update_url varchar(255) NOT NULL,
						links_update_method varchar(100) NOT NULL,
						links_delete_url varchar(255) NOT NULL,
						links_delete_method varchar(100) NOT NULL
					) $charset_collate;";  
			  
			  
    $wpdb->query($sql);
    $wpdb->query($videosSql);
    $wpdb->query($position_sql);
    $wpdb->query($articles_sql);
    $wpdb->query($videos_sql);
    $wpdb->query($playlist_sql);
	
}
