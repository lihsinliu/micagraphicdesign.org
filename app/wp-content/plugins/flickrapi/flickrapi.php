<?php
/*
Plugin Name: flickrAPI
Plugin URI: http://malton-webdesign.co.uk/flickrAPI/
Description: Slightly amended version of the popular flickrRSS plugin which allows you to integrate photos from Flickr into your site.  
Get a Flickr API key to allow more than the RSS feed limit of 20 photos. Original authors of FlickRSS Dave Kellam and Stefano Verna.
Version: 0.7
License: GPL
Author: Dave Walker.
Author URI: http://malton-webdesign.co.uk/about
*/

if (!class_exists('flickrAPI')) {
	class flickrAPI {
	
		function flickrAPI() {
			$this->version = "0.7";
		}
	
		function setupActivation() {
		
			function get_and_delete_option($setting) { $v = get_option($setting); delete_option($setting); return $v; }
		
			// check for previously installed version - 0.4 or older
			if (get_option('flickrAPI_flickrid')) {
				// let's port previous settings and delete them
				$settings = $this->fixArguments(array(
					get_and_delete_option('flickrAPI_display_numitems'),
					get_and_delete_option('flickrAPI_display_type'),
					get_and_delete_option('flickrAPI_api'),
					get_and_delete_option('flickrAPI_tags'),
					get_and_delete_option('flickrAPI_display_imagesize'),
					get_and_delete_option('flickrAPI_before'),
					get_and_delete_option('flickrAPI_after'),
					get_and_delete_option('flickrAPI_flickrid'),
					get_and_delete_option('flickrAPI_set'),
					get_and_delete_option('flickrAPI_use_image_cache'),
					get_and_delete_option('flickrAPI_image_cache_uri'),
					get_and_delete_option('flickrAPI_image_cache_dest'),
					get_and_delete_option('flickrAPI_text')					
				));
				update_option('flickrAPI_settings', $settings);
			}
		
			// update version number
			if (get_option('flickrAPI_version') != $this->version)
				update_option('flickrAPI_version', $this->version);
		}
	
		function fixArguments($args) {
			$settings = array();
		
			if (isset($args[0])) $settings['num_items'] = $args[0];
		  	if (isset($args[1])) $settings['type'] = $args[1];
		  	if (isset($args[2])) $settings['tags'] = $args[2];
		  	if (isset($args[6])) $settings['id'] = $args[6];
		  	if (isset($args[7])) $settings['set'] = $args[7];
			if (isset($args[8])) $settings['do_cache'] = $args[8];
			if (isset($args[9])) $settings['cache_uri'] = $args[9];
			if (isset($args[10])) $settings['cache_path'] = $args[10];
			
			if (isset($args[11])) $settings['api'] = $args[11];
			if (isset($args[12])) $settings['debug'] = $args[12];
			if (isset($args[13])) $settings['text'] = $args[13];	
			
			$imagesize = $args[3]?$args[3]:"square";
			$before_image = $args[4]?$args[4]:"";
			$after_image = $args[5]?$args[5]:"";

			$settings['html'] = $before_image . '<a href="%flickr_page%" title="%title%"><img src="%image_'.$imagesize.'%" alt="%title%" /></a>' . $after_image;
		
			return $settings;
		}
	
		function getSettings() {
			
			if (!get_option('flickrAPI_settings')) $this->setupActivation();
			
			$settings = array(
				/*== Content params ==*/
				// The type of Flickr images that you want to show. Possible values: 'user', 'favorite', 'set', 'group', 'public'
				'type' => 'public',
				// Optional: but the point of the plugin! - The Flickr API Key 
				'api' => '',
				// Optional: To be used when type = 'user' or 'public', comma separated
				'tags' => '',
				// Optional: To be used when type = 'set' 
				'set' => '',
				// Optional: Your Group or User ID. To be used when type = 'user' or 'group'
				'id' => '',
				// Optional: Text to search Flickr for 
				'text' => '',
				// Debug the plugin?
				'debug' => false,
				// Do you want caching?
				'do_cache' => false,
				// The image sizes to cache locally. Possible values: 'square', 'thumbnail', 'small' or 'medium' provided within an array
				'cache_sizes' => array('square'),
				// Where images are saved (Server path)
				'cache_path' => '',
				// The URI associated to the cache path (web address)
				'cache_uri' => '',
			
				/*== Presentational params ==*/
				 // The number of thumbnails you want
				'num_items' => 4,
				 // the HTML to print before the list of images
				'before_list' => '',
				// the code to print out for each image. Meta tags available:
				// - %flickr_page%
				// - %title%
				// - %image_small%, %image_square%, %image_thumbnail%, %image_medium%
				'html' => '<a href="%flickr_page%" title="%title%"><img src="%image_square%" alt="%title%"/></a>',
				// the default title
				'default_title' => "Untitled Flickr photo", 
				// the HTML to print after the list of images
				'after_list' => ''
			);
			if (get_option('flickrAPI_settings'))
				$settings = array_merge($settings, get_option('flickrAPI_settings'));
			return $settings;
		}
	
		function getRSS($settings) {
			if (!function_exists('MagpieRSS')) { 
				// Check if another plugin is using RSS, may not work
				include_once (ABSPATH . WPINC . '/rss.php');
				error_reporting(E_ERROR);
			}


            // Now we get the feeds
			//
			// First we check to ensure that the Flickr API key has been set.
			//
			// We can use them with - Groups / Users / Public options
			
			// The 1st check ensures the API and User settings...  otherwise we're back to normal FlickRSS
			

			
			if ($settings['api'] != '' && $settings['type'] == "user") { $rss_url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $settings['api'] . '&user_id=' . $settings['id'] . '&tags=' . $settings['tags'] . '&format=feed-georss&per_page=50'; }
			
			elseif ($settings['api'] != '' && $settings['type'] == "group") { $rss_url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $settings['api'] . '&group_id=' . $settings['id'] . '&tags=' . $settings['tags'] . '&format=feed-georss&per_page=50'; }
			
			elseif ($settings['api'] != '' && $settings['type'] == "public") {
				
				// If the Text field is empty then all we can do is retrieve the most recent photos uploaded
				// otherwise we'll use Text or Tags or both to find the photos
				
				if ($settings['text'] == '' && $settings['tags'] == '') {
				  $rss_url = 'http://api.flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=' . 
				              $settings['api'] . '&format=feed-georss&per_page=50';
				}
				else {
				  $rss_url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=' . 
				              $settings['api'] . '&text=' . $settings['text'] . '&tags=' . 
							  $settings['tags'] . '&format=feed-georss&per_page=50';	
				}
				
			}
			
			
			// We resort to normal feeds with no FLickr API key is the fields are not filled in properly
			
			elseif ($settings['type'] == "user") { $rss_url = 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $settings['id'] . '&tags=' . $settings['tags'] . '&format=rss_200'; }
			elseif ($settings['type'] == "favorite") { $rss_url = 'http://api.flickr.com/services/feeds/photos_faves.gne?id=' . $settings['id'] . '&format=rss_200'; }
			elseif ($settings['type'] == "set") { $rss_url = 'http://api.flickr.com/services/feeds/photoset.gne?set=' . $settings['set'] . '&nsid=' . $settings['id'] . '&format=rss_200'; }
			elseif ($settings['type'] == "group") { $rss_url = 'http://api.flickr.com/services/feeds/groups_pool.gne?id=' . $settings['id'] . '&format=rss_200'; }
			elseif ($settings['type'] == "public" || $settings['type'] == "community") { $rss_url = 'http://api.flickr.com/services/feeds/photos_public.gne?tags=' . $settings['tags'] . '&format=rss_200'; }
			else { 
				print '<strong>No "type" parameter has been setup. Check your flickrAPI Settings page, or provide the parameter as an argument.</strong>';
				die();
			}
			
			
			// Debug Message to check the Flickr API call.

			if ( $settings['debug'] == "true") {
			  echo 'Debug ON : The Flickr Feed call is : <p>' . $rss_url . '</p>';

			}
			
			# get rss file
			return @fetch_rss($rss_url);
		}
	
		function printGallery($settings = array()) {
		
			if (!is_array($settings)) {
				$settings = $this->fixArguments(func_get_args());
			}
		
			$settings = array_merge($this->getSettings(), $settings);
			if (!($rss = $this->getRSS($settings))) return;
			# specifies number of pictures
			$items = array_slice($rss->items, 0, $settings['num_items']);
			echo stripslashes($settings['before_list']);
		
		
		    # builds html from array
			foreach ( $items as $item ) {

				if(!preg_match('<img src="([^"]*)" [^/]*/>', $item['description'], $imgUrlMatches)) {
					continue;
				}
				$baseurl = str_replace("_m.jpg", "", $imgUrlMatches[1]);
				$thumbnails = array(
					'small' => $baseurl . "_m.jpg",
					'square' => $baseurl . "_s.jpg",
					'thumbnail' => $baseurl . "_t.jpg",
					'medium' => $baseurl . ".jpg"
					//'large' => $baseurl . "_b.jpg"
				);
				
				//dw debug	
                if ( $settings['debug'] == "true") {
			      echo '<p>Debug ON : This photo item description is:</p>' .
				       '<p>' . $item['description'] . '</p>' . 
				       '<p>Image URL : ' . $imgUrlMatches[1] . ' <-- Debug OFF </p>';
				}


                #check if there is an image title (for html validation purposes)
				if($item['title'] !== "") 
					$title = htmlspecialchars(stripslashes($item['title']));
				else 
					$title = $settings['default_title'];
				$url = $item['link'];
				$toprint = stripslashes($settings['html']);
				$toprint = str_replace("%flickr_page%", $url, $toprint);
				$toprint = str_replace("%title%", $title, $toprint);
			
				$cachePath = trailingslashit($settings['cache_uri']);
				$fullPath = trailingslashit($settings['cache_path']);
			
				foreach ($thumbnails as $size => $thumbnail) {
					if (
							is_array($settings['cache_sizes']) && 
							in_array($size, $settings['cache_sizes']) && 
							$settings['do_cache'] == "true" && 
							$cachePath && 
							$fullPath && 
							strpos($settings['html'], "%image_".$size."%")
					) {
						$img_to_cache = $thumbnail;
						preg_match('<http://farm[0-9]{0,3}\.static.flickr\.com/\d+?\/([^.]*)\.jpg>', $img_to_cache, $flickrSlugMatches);
						$flickrSlug = $flickrSlugMatches[1];
						if (!file_exists("$fullPath$flickrSlug.jpg") ) {   
							$localimage = fopen("$fullPath$flickrSlug.jpg", 'wb');
							$remoteimage = wp_remote_fopen($img_to_cache);
							$iscached = fwrite($localimage,$remoteimage);
							fclose($localimage);
						} else {
							$iscached = true;
						}
						if($iscached) $thumbnail = "$cachePath$flickrSlug.jpg";
					}
					$toprint = str_replace("%image_".$size."%", $thumbnail, $toprint);
				}
				echo $toprint;
			}
			echo stripslashes($settings['after_list']);
		}
	
		function setupWidget() {
			if (!function_exists('register_sidebar_widget')) return;
			function widget_flickrAPI($args) {
				extract($args);
				$options = get_option('widget_flickrAPI');
				$title = $options['title'];
				echo $before_widget . $before_title . $title . $after_title;
				get_flickrAPI();
				echo $after_widget;
			}
			function widget_flickrAPI_control() {
				$options = get_option('widget_flickrAPI');
				if ( $_POST['flickrAPI-submit'] ) {
					$options['title'] = strip_tags(stripslashes($_POST['flickrAPI-title']));
					update_option('widget_flickrAPI', $options);
				}
				$title = htmlspecialchars($options['title'], ENT_QUOTES);
				$settingspage = trailingslashit(get_option('siteurl')).'wp-admin/options-general.php?page='.basename(__FILE__);
				echo 
				'<p><label for="flickrAPI-title">Title:<input class="widefat" name="flickrAPI-title" type="text" value="'.$title.'" /></label></p>'.
				'<p>To control the other settings, please visit the <a href="'.$settingspage.'">flickrAPI Settings page</a>.</p>'.
				'<input type="hidden" id="flickrAPI-submit" name="flickrAPI-submit" value="1" />';
			}
			register_sidebar_widget('flickrAPI', 'widget_flickrAPI');
			register_widget_control('flickrAPI', 'widget_flickrAPI_control');
		}
	
		function setupSettingsPage() {
			if (function_exists('add_options_page')) {
				add_options_page('flickrAPI Settings', 'flickrAPI', 8, basename(__FILE__), array(&$this, 'printSettingsPage'));
			}
		}
	
		function printSettingsPage() {
			$settings = $this->getSettings();
			if (isset($_POST['save_flickrAPI_settings'])) {
				foreach ($settings as $name => $value) {
					$settings[$name] = $_POST['flickrAPI_'.$name];
				}
				$settings['cache_sizes'] = array();
				foreach (array("small", "square", "thumbnail", "medium") as $size) {
					if ($_POST['flickrAPI_cache_'.$size]) $settings['cache_sizes'][] = $size;
				}
				update_option('flickrAPI_settings', $settings);
				echo '<div class="updated"><p>flickrAPI settings saved!</p></div>';
			}
			if (isset($_POST['reset_flickrAPI_settings'])) {
				delete_option('flickrAPI_settings');
				echo '<div class="updated"><p>flickrAPI settings restored to default!</p></div>';
			}
			include ("flickrapi-settingspage.php");
		}
	}
}
$flickrAPI = new flickrAPI();
add_action( 'admin_menu', array(&$flickrAPI, 'setupSettingsPage') );
add_action( 'plugins_loaded', array(&$flickrAPI, 'setupWidget') );
register_activation_hook( __FILE__, array( &$flickrAPI, 'setupActivation' ));

function get_flickrAPI($settings = array()) {
	global $flickrAPI;
	if (func_num_args() > 1 ) {
		$old_array = func_get_args();
		$flickrAPI->printGallery($flickrAPI->fixArguments($old_array));
	}
	else $flickrAPI->printGallery($settings);
}

?>