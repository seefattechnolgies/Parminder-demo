	<?php



/*

  Plugin Name: Mowplayer

  Plugin URI: http://wordpress.org/plugins/mowplayer/

  Description: View mowplayer video detail and use it

  Author: Mowplayer.com

  Version: 0.9

  Author URI: https://mowplayer.com/

 */



define('MOWPLAYER_PLUGIN_FILE', __FILE__);



/* Register plugin deactivate callback */

register_deactivation_hook(__FILE__, 'mow_uninstall');



/* Register plugin activate callback */

register_activation_hook(__FILE__, 'mow_install');



const MOW_LOGIN_URL = 'https://video.mowplayer.com/login/connect-account?redirect_uri=';

const MOW_VIDEO_API = 'https://video.mowplayer.com/video/api/all?token=';

const MOW_SCRIPT_URL = 'https://cdn.mowplayer.com/player.js?code=';



require( dirname(__FILE__) . '/install.php' );

require( dirname(__FILE__) . '/uninstall.php' );

require( dirname(__FILE__) . '/connect.php' );

 
class mowplayer_TinyMCESelector {



    public $buttonName = 'mowplayer_snippet_selector';



    function add() {

        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))

            return;



        if (get_user_option('rich_editing') === 'true') {

            add_filter('mce_external_plugins', array($this, 'addPlugin'));

            add_filter('mce_buttons', array($this, 'addBtn'));

        }

    }



    function addBtn($buttons) {

        array_push($buttons, "separator", $this->buttonName);

        return $buttons;

    }



    function addPlugin($plugin_array) {

        $plugin_array[$this->buttonName] = get_site_url() . '/index.php?mow=editor_js';



        if (get_user_option('rich_editing') === 'true') {

            return $plugin_array;

        }

    }



}



/**

 * Shortcode generate real snippet

 * @param Array $snippet

 * @return String

 */

function mow_show_content($snippet) {

    if (is_array($snippet)) {

        return do_shortcode('<script src="'. MOW_SCRIPT_URL.  $snippet['snippet'] . '" ></script>');

    }

		

}



/**

 * Add new query var

 * @param array $vars

 * @return Array

 */

function mow_query_vars($vars) {

    $vars[] = 'mow';

    return $vars;

}





/*	function wpdocs_theme_name_scripts1() {

		wp_enqueue_style( 'bootstrap-stylesheet',  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

		wp_enqueue_style( 'bootstrap-stylesheet',  'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css');

		wp_enqueue_style( 'bootstrap-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

		wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');

		wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

		wp_enqueue_script( 'bootstrap-js', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');

		wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/jquery-3.3.1.js');

		wp_enqueue_script( 'bootstrap-js', 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js');

		wp_enqueue_style( 'bootstrap-stylesheet', 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css');

		

		

		//wp_enqueue_script( 'autoresize-js', plugin_dir_url( __FILE__ ) . 'convForm/dist/autosize.min.js');

		//wp_enqueue_style( 'c-styles', plugin_dir_url( __FILE__ ) . 'css/mowplayer.css' );

		

	}

	add_action( 'wp_enqueue_scripts1', 'wpdocs_theme_name_scripts1' );

	*/

/**

 * Add mowplayer plugin link to menu

 */

 

function mow_menu() {

    add_menu_page('Mowplayer',  'Mowplayer',  'manage_options',  'mow-videos',  'mow_page',  plugins_url('images/logo.png', MOWPLAYER_PLUGIN_FILE));

    add_submenu_page('mow-videos', 'Account',  'Account',  'manage_options',  'mow-account',   'mow_account');

    add_submenu_page('mow-videos', 'All Videos',   'All Videos',  'manage_options',  'all-mow-videos', 'all_mow_videos');

    add_submenu_page('mow-videos', 'Videos articles', 'Videos articles', 'manage_options', 'mow-videos-articles', 'mow_videos_articles');

    add_submenu_page('mow-videos', 'My Playlists', 'My Playlists', 'manage_options', 'mow-playlists', 'mow_playlists');

    add_submenu_page('mow-videos', 'My Position', 'My Positions', 'manage_options', 'mow-positons', 'mow_positons');

	add_submenu_page('mow-videos', 'Settings', 'Settings', 'manage_options', 'mow-settings', 'mow_settings');
	add_submenu_page(null, 'MOW Delete', 'MOW Delete', 'manage_options', 'mow-delete', 'mow_delete');

	}


	function mow_account()

	{

		echo '<h1>Video Articles</h1>';

	}

	

	function all_mow_videos()

	{	//require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
		global $wpdb;
		$db_prefix = $wpdb->base_prefix;


		$sel_data_vid = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_videos", ARRAY_A);
			 
			
		echo '<h1>All Video</h1>';

		 

			?>
	 
 
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

				<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

				<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

				<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

				<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css "/>

				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				
				<link rel='stylesheet' id='mow_style-css'  href='<?php echo plugin_dir_url( __FILE__ );?>css/custom_curl_style.css' type='text/css' media='all' />

	 

			
			<div class="playlist-data all_video">

				<table id="example" class="table table-striped table-bordered" style="width:100%">

					<thead>

						<tr>

							

							<th>Video</th>

							<th>Title</th>
							
							<th>Action</th>

						</tr>

					</thead>

				<tbody>

			<?php
		
				//foreach($decoded_data['data'] as $cresult)
				foreach($sel_data_vid as $cresult)
				{ 
					 /* 
					echo '<pre>';
					print_r($cresult);
					echo  '</pre>';
					*/
					 
			?>
					<tr>
						<td class="data-img">
							<img class="data-img-jpg" src="<?php echo $cresult['thumbnail_jpg'];?>" width="140px" height="140px"/>
								<i class="fa fa-play-circle-o" style="display: block;"></i>
							<img  data-toggle="modal" data-target="#myModal<?php echo $cresult['video_id'];;?>" style="display: none;" class="data-img-gif" src="<?php echo $cresult['thumbnail_gif'];?>" width="140px" height="140px"/>
						</td>

						<td>
							<ul>
								<li><?php echo $cresult['title'];?> <button class="btn-circle" style="background-color:<?php if($cresult['status']== 'approved'){echo '#39820c';}elseif($cresult['status']== 'pending'){echo '#fbca35';} else{echo '#c72e2e';}?> ;" title="Ads Approval Pending"></button></li>
								<li><?php echo $cresult['description'];?></li>
								<li><span>Duration :<?php echo $cresult['duration_hhmm'].':'.$cresult['duration_seconds'];?>  |  Created :
									<?php $timestamp = strtotime($cresult['created_date']); echo date("d-M-Y", $timestamp);?></span></li>
								
								<li><span><?php echo $cresult['category_name'];?></span> <span>V.Articles</span></li>
							</ul>
						</td>

						<td><span class="delete" data-type="video" data-id="<?php echo $cresult['video_id']; ?>" data-method="<?php echo $cresult['links_delete_method']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
					</tr>
					
		<!-- Modal content-->	
				<div class="modal fade playlist_modal" id="myModal<?php echo  $cresult['id'];?>" role="dialog" style="background-color: rgba(0, 0, 0, 0.7);">		
					<div class="modal-dialog">	  		
						<div class="modal-content">				
							<div class="modal-header">					
								<button type="button" class="close" data-dismiss="modal">&times;</button>			
								<h4 class="modal-title"> <?php echo $cresult['title'];?></h4>			
							</div>				
							<div class="modal-body">			  
								 <iframe
									src="https://cdn.mowplayer.com/player.html?code=<?php  echo $cresult['code']; ?>"
									style="width: 100%;height: 250px;"
									frameborder="0"
									allow="autoplay; encrypted-media"
									allowfullscreen>
								 </iframe>			
							</div>				
						</div>				  	
					</div>		
				</div>
		<?php  		
				}
		?>
				</tbody>

				</table>
				
		 	
			</div>	
			
		<!-- Modal content-->				
				<!--<div class="modal fade playlist_modal" id="myModal" role="dialog" style="background-color: rgba(0, 0, 0, 0.7);">		
					<div class="modal-dialog">	  <!-- Modal content->			
						<div class="modal-content">				
							<div class="modal-header">					
								<button type="button" class="close" data-dismiss="modal">&times;</button>			
								<h4 class="modal-title">CGI Animated Short : "The D in David" - by Michelle Yi & Yaron Farkash </h4>			
							</div>				
							<div class="modal-body">			
								 <iframe
									src="https://cdn.mowplayer.com/player.html?code=v-mxfponrxnkc"
									style="width: 100%;height: 250px;"
									frameborder="0"
									allow="autoplay; encrypted-media"
									allowfullscreen>
								 </iframe>			
							</div>				
						</div>				  	
					</div>		
				</div>	-->	
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
			
			<script>

					jQuery(document).ready(function() 
						{
						jQuery('#example').DataTable();
					} );

			</script>
			<script>
				jQuery("span.delete").click(function(e) {
					var data_type = jQuery(this).attr('data-type');
					var data_id = jQuery(this).attr('data-id');
					var data_method = jQuery(this).attr('data-method');
 
						 var url = '<?php echo plugins_url('mow_wp_plugin-master/ajax.php');?>';
								//var url	='admin-ajax.php';
						$.ajax({
							   type: "POST",
							   url: url,
							   data: {
								   'data_action' : 'delete',
								   'data_type' : data_type,
								   'data_id' : data_id, 
								   'data_method' : data_method, 
							   }, // serializes the form's elements.
							   success: function(data)
							   {
								   alert(data); // show response from the php script.
							   }
							 });

						e.preventDefault(); // avoid to execute the actual submit of the form.
					});
			</script>

		<?php

	}
	/*
	function mow_delete()
	{
		echo '<?pre>';
		print_r($_POST);
		echo '</pre>';
	} 
	add_action( 'wp_ajax_my_action', 'mow_delete' );
	*/
	function mow_playlists()
		{
			
			global $wpdb;
				$db_prefix = $wpdb->base_prefix;

				$sel_data_vid = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_playlist", ARRAY_A);

			echo '<h1>Playlists</h1>';

			

		?>

			<head>

				<meta charset="utf-8">

				<meta name="viewport" content="width=device-width, initial-scale=1">

				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

				<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

				<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

				<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

				<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css "/>

				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				
				<link rel='stylesheet' id='mow_style-css'  href='<?php echo plugin_dir_url( __FILE__ );?>css/custom_curl_style.css' type='text/css' media='all' />

			</head>

			<div class="playlist-data">

			<table id="example" class="table table-striped table-bordered" style="width:100%">				

				<thead> 

					<tr>

						<th>#</th>

						<th>Name</th>

						<th>Description</th>

						<th>Status</th>

						<th>Action</th>

					</tr>

				</thead>

				<tbody>

	<?php
			foreach($sel_data_vid as $cresult)
				{
					/*
					echo '<pre>';
					print_r($cresult);
					echo '</pre>';
					 */
	?>
					<tr>
						<td><?php echo $cresult['id'];?></td>

						<td><?php echo $cresult['name'];?></td>

						<td><?php echo $cresult['description'];?></td>

						<td><span><?php echo $cresult['status'];?> <i class="fa fa-video-camera" aria-hidden="true"></i></span></td>

						<td><span class="delete" data-type="playlists" data-id="<?php echo $cresult['playlist_id']; ?>" data-method="<?php echo $cresult['links_delete_method']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
					</tr>
	<?php  

				}

	?>
	
				</tbody>
			</table>

			</div>			

			<script>

				$(document).ready(function() {

					$('#example').DataTable();

				} );

			</script>
			<script>
				jQuery("span.delete").click(function(e) {
					var data_type = jQuery(this).attr('data-type');
					var data_id = jQuery(this).attr('data-id');
					var data_method = jQuery(this).attr('data-method');
 
						 var url = '<?php echo plugins_url('mow_wp_plugin-master/ajax.php');?>';
								//var url	='admin-ajax.php';
						$.ajax({
							   type: "POST",
							   url: url,
							   data: {
								   'data_action' : 'delete',
								   'data_type' : data_type,
								   'data_id' : data_id, 
								   'data_method' : data_method, 
							   }, // serializes the form's elements.
							   success: function(data)
							   {
								   alert(data); // show response from the php script.
							   }
							 });

						e.preventDefault(); // avoid to execute the actual submit of the form.
					});
			</script>
	<?php

		}


	function mow_videos_articles()
		{
			global $wpdb;
				$db_prefix = $wpdb->base_prefix;

				$sel_data_vid = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_video_articles", ARRAY_A);
				
			echo '<h1>Video Articles</h1>';

				

	?>

		<head>

			<meta charset="utf-8">

			<meta name="viewport" content="width=device-width, initial-scale=1">

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css "/>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			
			<link rel='stylesheet' id='mow_style-css'  href='<?php echo plugin_dir_url( __FILE__ );?>css/custom_curl_style.css' type='text/css' media='all' />

		</head>

		<div class="playlist-data video-articles">

			<table id="example" class="table table-striped table-bordered" style="width:100%">

				<thead>

					<tr>
						
						<th>Name</th>

						<th>Category</th>

						<th>Behaviour</th>

						<th>Theme</th>

						<th>Action</th>

					</tr>

				</thead>

				<tbody>

	<?php

			foreach($sel_data_vid as $cresult)

				{
					 /* 
					echo '<pre>';
					print_r($cresult);
					echo '</pre>';
					*/
					 
	?>
					<tr>

						<td><?php echo $cresult['name'];?></td>

						<td><?php echo $cresult['category'];?></td>

						<td><?php echo $cresult['async'];?></td>

						<td><?php echo $cresult['theme'];?></td>

						<td><span class="delete" data-type="video-articles" data-id="<?php echo $cresult['article_id']; ?>" data-method="<?php echo $cresult['links_delete_method']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

					</tr>

	<?php  

				}

	?>
 
				</tbody>

			</table>

		</div>

			<script>

				$(document).ready(function() {

					$('#example').DataTable();

				} );

			</script>
			<script>
				jQuery("span.delete").click(function(e) {
					var data_type = jQuery(this).attr('data-type');
					var data_id = jQuery(this).attr('data-id');
					var data_method = jQuery(this).attr('data-method');
 
						 var url = '<?php echo plugins_url('mow_wp_plugin-master/ajax.php');?>';
								//var url	='admin-ajax.php';
						$.ajax({
							   type: "POST",
							   url: url,
							   data: {
								   'data_action' : 'delete',
								   'data_type' : data_type,
								   'data_id' : data_id, 
								   'data_method' : data_method, 
							   }, // serializes the form's elements.
							   success: function(data)
							   {
								   alert(data); // show response from the php script.
							   }
							 });

						e.preventDefault(); // avoid to execute the actual submit of the form.
					});
			</script>

<?php
		}

	function mow_positons()

		{
			
			global $wpdb;
				$db_prefix = $wpdb->base_prefix;

				$sel_data_vid = $wpdb->get_results("SELECT * FROM ".$db_prefix."mow_player_postions", ARRAY_A);


			echo '<h1>Positions</h1>';

		

				?> 

		<head>

			<meta charset="utf-8">

			<meta name="viewport" content="width=device-width, initial-scale=1">

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css "/>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			
			<link rel='stylesheet' id='mow_style-css'  href='<?php echo plugin_dir_url( __FILE__ );?>css/custom_curl_style.css' type='text/css' media='all' />

			
		</head>

		<div class="playlist-data position_page">

			<table id="example" class="table table-striped table-bordered" style="width:100%">

				<thead>

					<tr>

						

						<th>#</th>

						<th>Name</th>

						<th>Video Behavior</th>

						<th>Status</th>

						<th>Action</th>

					</tr>

				</thead>

				<tbody>

	<?php
		$a=1;
		
			
			echo '</br>';
			
			foreach($sel_data_vid as $cresult)

				{
					 /*
					echo '<pre>';
					print_r($cresult);
					echo '</pre>';
					*/
	?>
					<tr>

						<td><?php echo $a++?></td>
						<td><?php echo $cresult['name'];?></td>
						<td><?php echo $cresult['behavior'];?></td>
						<td><span><?php echo $cresult['status'];?>  <i class="fa fa-video-camera" aria-hidden="true"> </i></span></td>
						<td><span class="delete" data-type="positions" data-id="<?php echo $cresult['position_id']; ?>" data-method="<?php echo $cresult['links_delete_method']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
					</tr>
	<?php  
				}

	?>
				 
				</tbody>

			</table>

		</div>

			<script>

				$(document).ready(function() {

					$('#example').DataTable();

				} );

			</script>
			<script>
				jQuery("span.delete").click(function(e) {
					var data_type = jQuery(this).attr('data-type');
					var data_id = jQuery(this).attr('data-id');
					var data_method = jQuery(this).attr('data-method');
 
						 var url = '<?php echo plugins_url('mow_wp_plugin-master/ajax.php');?>';
								//var url	='admin-ajax.php';
						$.ajax({
							   type: "POST",
							   url: url,
							   data: {
								   'data_action' : 'delete',
								   'data_type' : data_type,
								   'data_id' : data_id, 
								   'data_method' : data_method, 
							   }, // serializes the form's elements.
							   success: function(data)
							   {
								   alert(data); // show response from the php script.
							   }
							 });

						e.preventDefault(); // avoid to execute the actual submit of the form.
					});
			</script>
	<?php
		}

	function mow_settings()

			{

				echo '<h1>Settings</h1>';

			}

 
/**

 * Load either list videos page or connect account page

 * @global Object $wpdb

 */

function mow_page() {



    global $wpdb;



    $account = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "mowplayer_accounts WHERE id = 1 LIMIT 1;");



    if ($account !== null) {

        $videos = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "mowplayer_videos;");

        require( dirname(__FILE__) . '/list_videos.php' );

    } else {

        require( dirname(__FILE__) . '/connect_account.php' );

    }

}



/**

 * Add plugin CSS

 */

function mow_add_css() {

    wp_enqueue_script('jquery');

    wp_register_style('mow_style', plugins_url('css/mowplayer.css', MOWPLAYER_PLUGIN_FILE));

    wp_enqueue_style('mow_style');

}



/**

 * Add plugin JS

 * @param Object $wp

 */

function mow_parse_request($wp) {

    if (array_key_exists('mow', $wp->query_vars) && $wp->query_vars['mow'] == 'editor_js') {

        require( dirname(__FILE__) . '/editor.js.php' );

        die;

    }

}



add_action('admin_head', array(new mowplayer_TinyMCESelector(), 'add'));

add_action('admin_post_submit-form', 'mow_check_login');

add_action('parse_request', 'mow_parse_request');

add_filter('query_vars', 'mow_query_vars');

add_shortcode('mow-code', 'mow_show_content');

add_filter('widget_text', 'do_shortcode');

add_action('admin_enqueue_scripts', 'mow_add_css');

add_action('admin_menu', 'mow_menu');



class jpen_mow_Playlist extends WP_Widget

	{

	  public function __construct()

	  {

		$widget_options = array( 

		  'classname' => 'mow_playlist',

		  'description' => 'This is an Mow Playlist',

		);

		parent::__construct( 'mow_playlist', 'Mow Playlist', $widget_options );

	  }

	  

	  public function widget( $args, $instance)

	  {

	  $title = apply_filters( 'widget_title', $instance[ 'title' ] );

	  $blog_title = get_bloginfo( 'name' );

	  $tagline = get_bloginfo( 'description' );

	  echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>



	  <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>

	  <p><strong>Tagline:</strong> <?php echo $tagline ?></p>



	  <?php echo $args['after_widget'];

		}

		public function form( $instance )

		{

			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>

			<p>

				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />

			</p>

	  <?php 

		}

		public function update( $new_instance, $old_instance )

		{

		  $instance = $old_instance;

		  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

		  return $instance;

		}

		

	}

class jpen_mow_Videos extends WP_Widget

	{

	  public function __construct()

	  {

		$widget_options = array( 

		  'classname' => 'mow_Videos',

		  'description' => 'This is an Mow Videos',

		);

		parent::__construct( 'mow_Videos', 'Mow Videos', $widget_options );

	  }

	  

	  public function widget( $args, $instance)

	  {

	  $title = apply_filters( 'widget_title', $instance[ 'title' ] );

	  $blog_title = get_bloginfo( 'name' );

	  $tagline = get_bloginfo( 'description' );

	  echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>



	  <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>

	  <p><strong>Tagline:</strong> <?php echo $tagline ?></p>



	  <?php echo $args['after_widget'];

		}

		public function form( $instance )

		{

			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>

			<p>

				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />

			</p>

	  <?php 

		}

		public function update( $new_instance, $old_instance )

		{

		  $instance = $old_instance;

		  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

		  return $instance;

		}

		

	}

class jpen_mow_video_articles extends WP_Widget

	{

	  public function __construct()

	  {

		$widget_options = array( 

		  'classname' => 'mow_video_articles',

		  'description' => 'This is an Mow Playlist',

		);

		parent::__construct( 'mow_video_articles', 'Mow Video Article', $widget_options );

	  } 

	  

	  public function widget( $args, $instance)

	  {

	  $title = apply_filters( 'widget_title', $instance[ 'title' ] );

	  $blog_title = get_bloginfo( 'name' );

	  $tagline = get_bloginfo( 'description' );

	  echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>



	  <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>

	  <p><strong>Tagline:</strong> <?php echo $tagline ?></p>



	  <?php echo $args['after_widget'];

		}

		public function form( $instance )

		{

			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>

			<p>

				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />

			</p>

	  <?php 

		}

		public function update( $new_instance, $old_instance )

		{

		  $instance = $old_instance;

		  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

		  return $instance;

		}

		

	}

	

	function jpen_register_mow_widget() 

		{

		  register_widget( 'jpen_mow_Playlist' );

		  register_widget( 'jpen_mow_Videos' );

		  register_widget( 'jpen_mow_video_articles' );

		}

	add_action( 'widgets_init', 'jpen_register_mow_widget' );

	