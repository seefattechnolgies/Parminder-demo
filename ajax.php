<?php 
	 if(isset($_POST['data_action']))
	 {   
		require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
		global $wpdb;
		$db_prefix = $wpdb->base_prefix;
		$data_type = $_POST['data_type'];
		$data_id =  $_POST['data_id'];
		$data_method =  $_POST['data_method'];
		$barrer_key = 'mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf';
		$url = "https://api.mowplayer.com/".$data_type."/".$data_id;
		$ch_art = curl_init(); 
		curl_setopt($ch_art, CURLOPT_URL, $url);
		curl_setopt($ch_art, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch_art, CURLOPT_CUSTOMREQUEST,  $data_method);   
		curl_setopt($ch_art, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch_art, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch_art, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
		curl_setopt($ch_art, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: Bearer '.$barrer_key)	
		);
		if(curl_exec($ch_art) === false)
		{
			echo 'Curl error: ' . curl_error($ch_art);
		}     
		$errors_pos = curl_error($ch_art);
		$result_pos = curl_exec($ch_art);
		$returnCode = (int)curl_getinfo($ch_art, CURLINFO_HTTP_CODE);
		$decoded_data_pos = json_decode($result_pos, true);
		echo $returnCode;
		echo '<br/>';
		if($returnCode == '200')
		{  
			if($data_type == 'videos'){
				$table = $db_prefix.'mow_player_videos';
				$delete_success = $wpdb->delete( $table, array( 'video_id' => $data_id) );
				if($delete_success){
					echo 'Video deleted successfully';
				}
				else
				{
					echo 'Error';
				}
			}
			elseif($data_type == 'playlists'){
				$table = $db_prefix.'mow_player_playlist';
				$delete_success = $wpdb->delete( $table, array( 'playlist_id' => $data_id) );
				
				if($delete_success){
					echo 'Playlist deleted successfully';
				}
				else
				{
					echo 'Error';
				}
			}
			elseif($data_type == 'video-articles'){
				$table = $db_prefix.'mow_player_videos';
				$delete_success = $wpdb->delete( $table, array( 'video_id' => $data_id) );
				
				if($delete_success){
					echo 'Article deleted successfully';
				}
				else
				{
					echo 'Error';
				}
			}
			elseif($data_type == 'positions'){
				$table = $db_prefix.'mow_player_postions';
				$delete_success = $wpdb->delete( $table, array( 'position_id' => $data_id) );
				
				if($delete_success){
					echo 'Position deleted successfully';
				}
				else
				{
					echo 'Error';
				}
			}
		}
		else
		{
			echo 'Sorry ! Something went wrong. Please try again';
		}	
		curl_close($ch_art);

	}
?>