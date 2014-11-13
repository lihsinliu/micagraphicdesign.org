=== Flickr API ===
   
Contributors: Dave Walker 
Tags: flickr, api, photos, images, sidebar, widget, rss
Requires at least: 2.6
Tested up to: 3.3.2
Beta Release: 0.7

This plugin is an amended version of flickrRSS by "eightface".  

As well as allowing you to integrate Flickr photos into your site, supporting user, set, favorite, group and community photostreams - will also allow the 
user grab more than 20 photos (a restriction of FLickrRSS)

If you want more than the maximum of 20 photos from the Flickr RSS feed then you can use a Flickr API key 
to return more photos.  The Non Commercial API License will allow up to 30 photos per page, however I have 
sucessfully tested up to 50 photos with the plugin.  The plugin could therefore also be used with a Commercial 
plugin.


== Description ==

This plugin allows you to easily display Flickr photos on your site and using the Flickr API doesn't limit you to
the standard 20 photos.  It supports user, set, favorite, group and public photostreams. 

The plugin is relatively easy to setup and configure via an options panel. 
It also has support for an image cache located on your server.


== Installation ==

1. Put the flickr API files into your plugins directory
2. If you want to cache images, create a directory and make it writable
3. Activate the plugin
4. Configure your settings via the panel in Options
5. Add `<?php get_flickrAPI(); ?>` somewhere in your templates


== Feedback and Support ==

For API problems you can visit the plugin page (http://malton-webdesign.co.uk/flickrapi)


== Advanced ==

The plugin also supports a number of parameters, allowing you to have multiple instances across your 

site.

1. `'type' => 'user'` - The type of Flickr images that you want to show. Possible values: 'user', 

'favorite', 'set', 'group', 'public'</li>
2. `'api' => ''` - Optional but the point of the plugin!</li>
2. `'tags' => ''` - Optional: Can be used with type = 'user' or 'public', comma separated</li>
3. `'set' => ''` - Optional: To be used with type = 'set'</li>
4. `'id' => ''` - Optional: Your Group or User ID. To be used with type = 'user' or 'group'</li>
5. `'do_cache' => false` - Enable the image cache</li>
6. `'cache_sizes' => array('square')` - What are the image sizes we want to cache locally? Possible 
values: 'square', 'thumbnail', 'small', 'medium'</li>
7. `'cache_path' => ''` - Where the images are saved (server path)</li>
8. `'cache_uri' => ''` - The URI associated to the cache path (web address)</li>
9. `'num_items' => 4` - The number of images that you want to display</li>
10. `'before_list' => ''` - The HTML to print before the list of images</li>
11. `'html' => '<a href="%flickr_page%" title="%title%"><img src="%image_square%" alt="%title%"></a&>'` - 

the code to print out for each image.
	Meta tags available: %flickr_page%, %title%, %image_small%, %image_square%, %image_thumbnail%, 

%image_medium%, %image_large%
12. `'default_title' => "Untitled Flickr photo"` - the default title</li>
13. `'after_list' => ''` - the HTML to print after the list of images</li>

**Example 1**

      get_flickrAPI(array('num_items' => 36, 
                          'type' => 'group', 
                          'tags' => '',
                          'id' => '12325216@N00',
                          'api' => '3370ecbd3e604245581eb4955fd6xxxx')); ?>
                          
This would show the 36 most recent group photos

**Example 2**

      get_flickrAPI(array('num_items' => 30, 
                          'type' => 'user', 
                          'tags' => '',
                          'id' => '10529805@N00',
                          'api' => '3370ecbd3e604245581eb4955fd6xxxx')); ?>

This would show the 30 most recent thumbnail sized photos from the specified user's set.

**Example 3**

      get_flickrAPI(array('num_items' => 30, 
                          'type' => 'public', 
						  'text' => '',
                          'tags' => '',
                          'api' => '3370ecbd3e604245581eb4955fd6xxxx')); ?>

This would show the 30 most recent photos from all of FLickr.


== Plugin History ==

* 0.7 - Change of the Support page to new website
* 0.6 - Removed the Large option as FLickr seem to have removed it.
* 0.5 - Added search by Text facilty
* 0.4 - Debug Option Added 
* 0.3 - Upgrade bug fix. 
* 0.2 - Readme.txt updated properly
* 0.1 - Beta release (Plugin amended from the original "eightface" flickrRSS plugin

