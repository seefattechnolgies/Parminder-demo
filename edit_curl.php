<?php



	$url = "https://api.mowplayer.com/videos/3335224796";
	$method = 'PUT';
	$barrer_key = 'mowdvus0ppkwli98jufdc04smnofv83fuor1ph3hc4698rxikori9dyju60yje9xvdf';
	
	if (!empty($url) && !empty($method))
	{
	 	$ch_pos = curl_init(); 

		curl_setopt($ch_pos, CURLOPT_URL, $url);    

				curl_setopt($ch_pos, CURLOPT_CONNECTTIMEOUT, 20);

				curl_setopt($ch_pos, CURLOPT_CUSTOMREQUEST, $method);                                                                   

				curl_setopt($ch_pos, CURLOPT_RETURNTRANSFER, true);     

				curl_setopt($ch_pos, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($ch_pos, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

				curl_setopt($ch_pos, CURLOPT_HTTPHEADER, array(   

							'Accept: application/json',

							'Content-Type: application/json', 

							'Authorization: Bearer '.$barrer_key)	
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

			echo '<pre>';
			print_r($decoded_data_pos);
			echo '<pre>';
	}
	else
	{echo 'no parameter  exist in this request contact to plugin developrs ';}
			 
			
		?>