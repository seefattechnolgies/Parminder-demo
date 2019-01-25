<?php

		require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
		global $wpdb;
		$db_prefix = $wpdb->base_prefix;

		$ch_vid = curl_init(); 

				curl_setopt($ch_vid, CURLOPT_URL, "https://api.mowplayer.com/videos?site_id=372222792436&page_length=10&keywords=&page=1&sort_by=name&sort_order=desc");    

				curl_setopt($ch_vid, CURLOPT_CONNECTTIMEOUT, 20);

				curl_setopt($ch_vid, CURLOPT_CUSTOMREQUEST, "GET");  

				curl_setopt($ch_vid, CURLOPT_RETURNTRANSFER, true);     

				curl_setopt($ch_vid, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($ch_vid, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

				curl_setopt($ch_vid, CURLOPT_HTTPHEADER, array(   

					'Accept: application/json',

					'Content-Type: application/json', 

					'Authorization: Bearer mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf')			

				);             

					if(curl_exec($ch_vid) === false)

						{
							echo 'Curl error: ' . curl_error($ch_vid);
						}                                                                                                      

					$errors_vid = curl_error($ch_vid);                                                                                                            

					$result_vid = curl_exec($ch_vid);

					$returnCode_vid = (int)curl_getinfo($ch_vid, CURLINFO_HTTP_CODE);

					curl_close($ch_vid);  

				$decoded_data_vid = json_decode($result_vid, true);

					foreach($decoded_data_vid['data'] as $cresult_vid)
					{
						//echo '<pre>';
						//print_r($cresult);
						//echo '</pre>';
						//$wpdb->prefix .'mow_player_videos';
							if($cresult_vid['id'] != ''){
								$id 	=	$cresult_vid['id'];
								}
								else
								{
									$id = '';
								}
							if($cresult_vid['site_id'] != ''){		
								$site_id 	=	$cresult_vid['site_id'];
								}
								else
								{
									$site_id = '';
								}
							if($cresult_vid['category']['id'] != ''){
								$category_id 	=	$cresult_vid['category']['id']; 
								}
								else
								{
									$category_id  = '';
								}
							if($cresult_vid['category']['name'] != ''){
								$category_name	 =	$cresult_vid['category']['name'];
								}
								else
								{
									$category_name  = '';
								}
							if($cresult_vid['code'] != ''){
								$code 	=	$cresult_vid['code']; 
								}
								else
								{
									$code  = '';
								}
							if($cresult_vid['title'] != ''){
								$title 	= 	$cresult_vid['title'];
								}
								else
								{
									$title  = '';
								}
							if($cresult_vid['site'] != ''){
								$site 	=	$cresult_vid['site'];
								}
								else
								{
									$site  = '';
								}
							if($cresult_vid['description'] != ''){
								$description 	=	$cresult_vid['description'];
								}
								else
								{
									$description  = '';
								}
							if($cresult_vid['thumbnail']['jpg'] != ''){
								$thumnail_jpg 	=	$cresult_vid['thumbnail']['jpg']; 
								}
								else
								{
									$thumnail_jpg  = '';
								}
							if($cresult_vid['thumbnail']['gif'] != ''){
								$thumnail_gif	=	$cresult_vid['thumbnail']['gif'];
								}
								else
								{
									$thumnail_gif  = '';
								}
							if($cresult_vid['duration']['seconds'] != ''){
								$duration_seconds =	$cresult_vid['duration']['seconds']; 
								}
								else
								{
									$duration_seconds  = '';
								}
							if($cresult_vid['duration']['hhmm'] != ''){
								$duration_hhmm =	$cresult_vid['duration']['hhmm'];
								}
								else
								{
									$duration_hhmm  = '';
								}
							if($cresult_vid['video_size'] != ''){
								$video_size 	=	$cresult_vid['video_size']; 
								}
								else
								{
									$video_size  = '';
								}
							if($cresult_vid['video_article']['title'] != ''){
								$video_article_title  =	$cresult_vid['video_article']['title'];
								}
								else
								{
									$video_article_title  = '';
								}
							if($cresult_vid['video_article']['description'] != ''){
								$video_article_description  =	$cresult_vid['video_article']['description']; 
								}
								else
								{
									$video_article_description  = '';
								}
							if($cresult_vid['video_article']['url'] != ''){
								$video_article_url  =	$cresult_vid['video_article']['url'];
								}
								else
								{
									$video_article_url  = '';
								}
							if($cresult_vid['status'] != ''){
								$status 	=		$cresult_vid['status'];
								}
								else
								{
									$status  = '';
								}
							if($cresult_vid['created_at']['date'] != ''){
								$created_date  =	$cresult_vid['created_at']['date']; 
								}
								else
								{
									$created_date  = '';
								}
							if($cresult_vid['created_at']['timezone_type'] != ''){
								$created_timezone_type  =	$cresult_vid['created_at']['timezone_type'];
								}
								else
								{
									$created_timezone_type  = '';
								}
							if($cresult_vid['created_at']['timezone'] != ''){
								$created_timezone 	=		$cresult_vid['created_at']['timezone'];
								}
								else
								{
									$created_timezone  = '';
								}
							if($cresult_vid['updated_at']['date'] != ''){
								$updated_date  	=		$cresult_vid['updated_at']['date']; 
								}
								else
								{
									$updated_date  = '';
								}
							if($cresult_vid['updated_at']['timezone_type'] != ''){
								$updated_timezone_type  =	$cresult_vid['updated_at']['timezone_type']; 
								}
								else
								{
									$updated_timezone_type  = '';
								}
							if($cresult_vid['updated_at']['timezone'] != ''){
								$updated_timezone  	=	$cresult_vid['updated_at']['timezone'];
								}
								else
								{
									$updated_timezone  = '';
								}
							if($cresult_vid['links']['update']['url'] != ''){
								$links_update_url  	=	$cresult_vid['links']['update']['url'];
								}
								else
								{
									$links_update_url  = '';
								}
							if($cresult_vid['links']['update']['method'] != ''){
								$links_update_method  	=		$cresult_vid['links']['update']['method'];
								}
								else
								{
									$links_update_method  = '';
								}
							
								if($cresult_vid['links']['delete']['url'] != ''){
								$links_delete_url  	=	$cresult_vid['links']['delete']['url']; 
								}
								else
								{
									$links_delete_url  = '';
								}
							if($cresult_vid['links']['delete']['method'] != ''){
								
								$links_delete_method  	=	$cresult_vid['links']['delete']['method'];
								}
								else
								{
									$links_delete_method  = '';
								}
								
						$data = array(
							  'video_id' =>  $id,
							  'site_id' =>  $site_id ,
							  'category_id' =>$category_id,
							  'category_name' =>  $category_name,
							  'code' =>  $code,
							  'title' =>  $title,
							  'site' =>  $site,
							  'description' =>  $description 	,
							  'autoplay' =>  $description 	,
							  'thumbnail_jpg' =>  $thumnail_jpg,
							  'thumbnail_gif' =>  $thumnail_gif,
							  'duration_seconds' =>  $duration_seconds,
							  'duration_hhmm' => $duration_hhmm ,
							  'video_size' =>  $video_size,
							  'video_article_title' =>  $video_article_title,
							  'video_article_description' =>  $video_article_description,
							  'video_article_url' => $video_article_url,
							  'status' =>  $status ,
							  'created_date' =>  $created_date,
							  'created_timezone_type' =>  $created_timezone_type,
							  'created_timezone' =>  $created_timezone,
							  'updated_date' =>  $updated_date,
							  'updated_timezone_type' =>  $updated_timezone_type,
							  'updated_timezone' =>  $updated_timezone,
							  'links_update_url' => $links_update_url ,
							  'links_update_method' =>  $links_update_method,
							  'links_delete_url' =>  $links_delete_url,
							  'links_delete_method' =>  $links_delete_method

						);		
								
								
			$sel_data_vid = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_videos WHERE (video_id = '". $id ."')");
			if($sel_data_vid)
			{
					//echo "Already exist video id ='". $id."'";
					$where = array('video_id'=>$id);
					//$result = $wpdb->update($db_prefix.'mow_player_videos',$data, $where);
					$wpdb->update($db_prefix.'mow_player_videos',$data, $where);
			
			}
			else
			{
				 $wpdb->insert($db_prefix.'mow_player_videos' , $data);
				/* $insert_data_vid =	$wpdb->insert($db_prefix.'mow_player_videos' , $data);
						if($insert_data_vid)
							{echo 'success';}
						else
							{echo 'not woring please check manually videos';}
				*/		
			}
	}
		
				
	//mow_playlist	here	no query here now 		
	
		$ch_play = curl_init(); 

				curl_setopt($ch_play, CURLOPT_URL, "https://api.mowplayer.com/playlists?site_id=372222792436&page_length=10&keywords=&page=1&sort_by=name&sort_order=desc");    

				curl_setopt($ch_play, CURLOPT_CONNECTTIMEOUT, 20);

				curl_setopt($ch_play, CURLOPT_CUSTOMREQUEST, "GET");  
                              
				curl_setopt($ch_play, CURLOPT_RETURNTRANSFER, true);     

				curl_setopt($ch_play, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($ch_play, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

				curl_setopt($ch_play, CURLOPT_HTTPHEADER, array(   

					'Accept: application/json',

					'Content-Type: application/json', 

					'Authorization: Bearer mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf')			

				);             

				if(curl_exec($ch_play) === false)

				{

					echo 'Curl error: ' . curl_error($ch_play);

				}                                                                                                      

				$errors_play = curl_error($ch_play);                                                                                                            

				$result_play = curl_exec($ch_play);

				$returnCode_play = (int)curl_getinfo($ch_play, CURLINFO_HTTP_CODE);

				curl_close($ch_play);  
				$decoded_data_play = json_decode($result_play, true);

				$decoded_data_play_d = $decoded_data_play['data'];
				foreach($decoded_data_play_d as $cresult_play){

					//echo '<pre>';

					//print_r($cresult);

						//echo '</pre>';

						//mow_player_playlist;
					
							$id 	=	$cresult_play['id'];
							$name 	=	$cresult_play['name'];
							$description_x	=	$cresult_play['description'];
							if(!empty($description_x)){
								$description	=	$cresult_play['description'];
							}
							else
							{
									$description	=	'';
							}
							$status 	=	$cresult_play['status'];
							$site_id 	=	$cresult_play['site_id'];
							$theme 	=	$cresult_play['theme'];
							$position 	=	$cresult_play['position'];
							$created_date  =	$cresult_play['created_at']['date']; 
							$created_timezone_type  =	$cresult_play['created_at']['timezone_type'];
							$created_timezone 	=		$cresult_play['created_at']['timezone'];
							$updated_date  	=		$cresult_play['updated_at']['date']; 
							$updated_timezone_type  =	$cresult_play['updated_at']['timezone_type']; 
							$updated_timezone  	=	$cresult_play['updated_at']['timezone'];
							$links_update_url  	=	$cresult_play['links']['update']['url'];
							$links_update_method  	=		$cresult_play['links']['update']['method'];
							$links_delete_url  	=	$cresult_play['links']['delete']['url']; 
							$links_delete_method  	=	$cresult_play['links']['delete']['method'];
							$links_action  	=	$cresult_play['links']['action'];
							
							$data = array(
									  'playlist_id' =>  $id,
									  'name' =>  $name ,
									  'description' => $description,
									  'status' =>  $status,
									  'site_id' =>  $site_id,
									  'theme' => $theme,
									  'position' =>  $position,
									  'created_date' =>  $created_date,
									  'created_timezone_type' =>  $created_timezone_type,
									  'created_timezone' =>  $created_timezone,
									  'updated_date' =>  $updated_date,
									  'updated_timezone_type' =>  $updated_timezone_type,
									  'updated_timezone' =>  $updated_timezone,
									  'links_update_url' => $links_update_url ,
									  'links_update_method' =>  $links_update_method,
									  'links_delete_url' =>  $links_delete_url,
									  'links_delete_method' =>  $links_delete_method,		
									  'links_action' =>  $links_action			
								);
							
							
					$sel_data_play = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_playlist WHERE (playlist_id = '". $id ."')");
					if($sel_data_play)
					{
						echo "Already exist playlist id ='". $id."'";
						$where = array('playlist_id'=>$id);
						$result = $wpdb->update($db_prefix.'mow_player_playlist',$data, $where);
					}
					else{
						
						$insert_data_play =	$wpdb->insert($db_prefix.'mow_player_playlist', $data );
						
							if($insert_data_play)
								{echo 'success';}
							else
								{echo 'not woring please check manually playlist ';}
					}
				}
				
				
		//video-articles		here
				
		$ch_art = curl_init(); 

				curl_setopt($ch_art, CURLOPT_URL, "https://api.mowplayer.com/video-articles?site_id=372222792436&page_length=10&keywords=&page=1&sort_by=name&sort_order=desc");    

				curl_setopt($ch_art, CURLOPT_CONNECTTIMEOUT, 20);

				curl_setopt($ch_art, CURLOPT_CUSTOMREQUEST, "GET");                                                                

				curl_setopt($ch_art, CURLOPT_RETURNTRANSFER, true); 

				curl_setopt($ch_art, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($ch_art, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

				curl_setopt($ch_art, CURLOPT_HTTPHEADER, array(   

					'Accept: application/json',

					'Content-Type: application/json', 

					'Authorization: Bearer mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf')			

				);             



				if(curl_exec($ch_art) === false)

				{

					echo 'Curl error: ' . curl_error($ch_art);

				}                                                                                                      

				$errors_art = curl_error($ch_art);                                                                                                            

				$result_art = curl_exec($ch_art);

				$returnCode_art = (int)curl_getinfo($ch_art, CURLINFO_HTTP_CODE);

				curl_close($ch_art);  

				 

				$decoded_data_art = json_decode($result_art, true);

				foreach($decoded_data_art['data'] as $cresult_art){

					//echo '<pre>';

					//print_r($cresult_art);

					//echo '</pre>';

					//$wpdb->prefix . "mow_player_video_articles";
					
					$id 	=	$cresult_art['id'];
					$name 	=	$cresult_art['name'];
					$category 	=	$cresult_art['category'];
					$site_id 	=	$cresult_art['site_id'];
					$theme 	=		$cresult_art['theme'];
					$async 	=		$cresult_art['async'];
					$created_date  =	$cresult_art['created_at']['date']; 
					$created_timezone_type  =	$cresult_art['created_at']['timezone_type'];
					$created_timezone 	=		$cresult_art['created_at']['timezone'];
					$updated_date  	=		$cresult_art['updated_at']['date']; 
					$updated_timezone_type  =	$cresult_art['updated_at']['timezone_type']; 
					$updated_timezone  	=	$cresult_art['updated_at']['timezone'];
					$links_update_url  	=	$cresult_art['links']['update']['url'];
					$links_update_method  	=		$cresult_art['links']['update']['method'];
					$links_delete_url  	=	$cresult_art['links']['delete']['url']; 
					$links_delete_method  	=	$cresult_art['links']['delete']['method'];
					$links_action  	=	$cresult_art['links']['action'];
					
					$data = array(
								  'article_id' =>  $id,
								  'name' =>  $name ,
								  'category' => $category_id,
								  'site_id' =>  $site_id,
								  'theme' =>  $theme,
								  'async' =>  $title,
								  'created_date' =>  $created_date,
								  'created_timezone_type' =>  $created_timezone_type,
								  'created_timezone' =>  $created_timezone,
								  'updated_date' =>  $updated_date,
								  'updated_timezone_type' =>  $updated_timezone_type,
								  'updated_timezone' => $updated_timezone,
								  'links_update_url' => $links_update_url ,
								  'links_update_method' =>  $links_update_method,
								  'links_delete_url' =>  $links_delete_url,
								  'links_delete_method' =>  $links_delete_method,		
								  'links_action' =>  $links_action			
								);
			
				$sel_data_art = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_video_articles WHERE (article_id = '". $id ."')");
					if($sel_data_art)
					{
						//echo "Already exist article id ='". $id."'";
							$where = array('article_id'=>$id);
						//$result = $wpdb->update($db_prefix.'mow_player_video_articles',$data, $where);
						$wpdb->update($db_prefix.'mow_player_video_articles',$data, $where);
					}
					else{
							$wpdb->insert($db_prefix.'mow_player_video_articles',$data);
							/* $insert_data_art =	$wpdb->insert($db_prefix.'mow_player_video_articles',$data);
								if($insert_data_art)
									{echo 'insert mow articles';}
								else
									{echo 'check manually articles';}
								*/
						}
				}
				
				
	//mow_positions		 here	
		$ch_pos = curl_init(); 

		curl_setopt($ch_pos, CURLOPT_URL, "https://api.mowplayer.com/positions?site_id=372222792436&page_length=10&keywords=&page=1&sort_by=name&sort_order=desc");    

				curl_setopt($ch_pos, CURLOPT_CONNECTTIMEOUT, 20);

				curl_setopt($ch_pos, CURLOPT_CUSTOMREQUEST, "GET");                                                                   

				curl_setopt($ch_pos, CURLOPT_RETURNTRANSFER, true);     

				curl_setopt($ch_pos, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($ch_pos, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

				curl_setopt($ch_pos, CURLOPT_HTTPHEADER, array(   

					'Accept: application/json',

					'Content-Type: application/json', 

					'Authorization: Bearer mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf')			

				);             



				if(curl_exec($ch_pos) === false)

				{

					echo 'Curl error: ' . curl_error($ch_pos);

				}                                                                                                      

				$errors_pos = curl_error($ch_pos);                                                                                                            

				$result_pos = curl_exec($ch_pos);

			$returnCode = (int)curl_getinfo($ch_pos, CURLINFO_HTTP_CODE);

			curl_close($ch_pos);  

			$decoded_data_pos = json_decode($result_pos, true);

			foreach($decoded_data_pos['data'] as $cresult_pos)
			{

					//echo '<pre>';

					//print_r($cresult_pos);

					//echo '</pre>';
					
					//$wpdb->prefix . "mow_player_postions";
					
					$id 	=	$cresult_pos['id'];
					$name 	=	$cresult_pos['name'];
					$behavior 	=	$cresult_pos['behavior']; 
					$status 	=		$cresult_pos['status'];
					$action 	=		$cresult_pos['action'];
					$links_update_url  	=	$cresult_pos['links']['update']['url'];
					$links_update_method  	=		$cresult_pos['links']['update']['method'];
					$links_delete_url  	=	$cresult_pos['links']['delete']['url']; 
					$links_delete_method  	=	$cresult_pos['links']['delete']['method'];
					
					$data = array(
						  'position_id' =>  $id,
						  'name' =>  $name ,
						  'behavior' =>$behavior,
						  'status' =>  $status,
						  'action' =>  $action,
						  'links_update_url' => $links_update_url ,
						  'links_update_method' =>  $links_update_method,
						  'links_delete_url' =>  $links_delete_url,
						  'links_delete_method' =>  $links_delete_method		
						);

				$sel_data_pos = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_postions WHERE (position_id = '". $id ."')");
					if($sel_data_pos){echo "Already exist position id ='". $id."'";
					
						$where = array('position_id'=>$id);
						$result = $wpdb->update($db_prefix.'mow_player_postions',$data, $where);
						}
					else
					{
						$insert_data_pos =	$wpdb->insert($db_prefix.'mow_player_postions',$data);
							if($insert_data_pos)
								{echo 'insert mow position';}
							else{echo 'check manually playlist';}
					}
			}
				
				
	?>