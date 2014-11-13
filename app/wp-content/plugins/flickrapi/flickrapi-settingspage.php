<div class="wrap">
	<h2>flickrAPI Settings</h2>

	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Display</th>
				<td>
					<select name="flickrAPI_num_items" id="flickrAPI_num_items">
						<?php for ($i=1; $i<=50; $i++) { ?>
							<option <?php if ($settings['num_items'] == $i) { echo 'selected'; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>	
						<?php } ?>
					</select>
					<select name="flickrAPI_type" id="flickrAPI_type">
						<option <?php if($settings['type'] == 'user') { echo 'selected'; } ?> value="user">user</option>
						<option <?php if($settings['type'] == 'set') { echo 'selected'; } ?> value="set">set</option>
						<option <?php if($settings['type'] == 'favorite') { echo 'selected'; } ?> value="favorite">favorite</option>
						<option <?php if($settings['type'] == 'group') { echo 'selected'; } ?> value="group">group</option>
						<option <?php if($settings['type'] == 'public') { echo 'selected'; } ?> value="public">public</option> 

					</select>
					photos.
				</td> 
			</tr>
			<tr valign="top" id="api">
				<th scope="row">API Key</th>
				<td><input name="flickrAPI_api" type="text" id="flickrAPI_api" value="<?php echo $settings['api']; ?>" size="40" /> Flickr API Key</p>
				<a href="http://www.flickr.com/services/apps/create/apply" id="apigetter">Get an API</a></td>
			</tr>			
			<tr valign="top" id="userid">
				<th scope="row" id="userid_label">User or Group ID</th>
				<td><input name="flickrAPI_id" type="text" id="flickrAPI_id" value="<?php echo $settings['id']; ?>" size="20" />
					<a href="http://idgettr.com/" target="_blank">Find your id</a></td>
			</tr>
			<tr valign="top" id="textsearch">
				<th scope="row" id="userid_label">Text Search (optional)</th>
				<td><input name="flickrAPI_text" type="text" id="flickrAPI_text" value="<?php echo $settings['text']; ?>" size="40" /> use '+' to join values e.g. fluffy+bunny</td>
			</tr>            
			<tr valign="top" id="set">
				<th scope="row">Set ID</th>
				<td><input name="flickrAPI_set" type="text" id="flickrAPI_set" value="<?php echo $settings['set']; ?>" size="40" /> Use number from the set url</td>
			</tr>
			<tr valign="top" id="tags">
				<th scope="row">Tags (optional)</th>
				<td><input name="flickrAPI_tags" type="text" id="flickrAPI_tags" value="<?php echo $settings['tags']; ?>" size="40" /> Comma separated, no spaces</td>
			</tr>
            
			<tr valign="top">
				<th scope="row">HTML Builder</th>
				<td>
					<table style="margin-left: -10px">
						<tr>
							<td colspan="2" valign="top" style="border-width: 0px;">
								<label for="flickrAPI_before_list">Before List:</label><br/><input name="flickrAPI_before_list" type="text" id="flickrAPI_before_list" value="<?php echo htmlspecialchars(stripslashes($settings['before_list'])); ?>" style="width:400px;" />
							</td>
						</tr>
						<tr>
							<td valign="top" style="border-width: 0px;">
								<label for="flickrAPI_html">Item HTML:</label><br/> <textarea name="flickrAPI_html" type="text" id="flickrAPI_html" style="width:400px;" rows="10"><?php echo htmlspecialchars(stripslashes($settings['html'])); ?></textarea>
							</td>
							<td valign="top" style="border-width: 0px;">
								<div>
									<h4>"Item HTML" metatags:</h4>
									<ul>
										<li><code>%flickr_page%</code></li>
										<li><code>%title%</code></li>
										<li><code>%image_square%</code></li>
										<li><code>%image_small%</code></li>
										<li><code>%image_thumbnail%</code></li>
										<li><code>%image_medium%</code></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="top" colspan="2" style="border-width: 0px;">
								<label for="flickrAPI_after_list">After List:</label><br/> <input name="flickrAPI_after_list" type="text" id="flickrAPI_after_list" value="<?php echo htmlspecialchars(stripslashes($settings['after_list'])); ?>" style="width:400px;" />
							</td>
						</tr>
                        
  
					</table>
				</td>
			</tr>
            
            
            <tr valign="top" id="debug"> 
               <th scope="row">Debug Enabled</th>
               <td><input name="flickrAPI_debug" type="checkbox" id="flickrAPI_debug" value="true" <?php if ($settings['debug'] == 'true') { echo 'checked="checked"'; } ?> />  
				<label for="use_image_cache"> (will cause message displays on screen)</label></td>

            </tr>
                        
		</table>

		<h3>Cache Settings</h3>
		<p>This allows you to store the images on your server and reduce the load on Flickr. </p>
        <p>Make sure the plugin works without the cache enabled first. If you're still having
			trouble, try visiting the <a href="http://malton-webdesign.co.uk/flickrapi/">flickrAPI support page</a> for help.</p>
		<table class="form-table">
			<tr valign="top">
				<th scope="row" colspan="2" class="th-full">
				<input name="flickrAPI_do_cache" type="checkbox" id="flickrAPI_do_cache" value="true" <?php if ($settings['do_cache'] == 'true') { echo 'checked="checked"'; } ?> />  
				<label for="use_image_cache">Enable the image cache</label></th>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">Image sizes to cache</th>
				<td>
					<?php
						foreach (array("small", "square", "thumbnail", "medium") as $size) {
							echo '<input type="checkbox" name="flickrAPI_cache_'.$size.'" id="cache_'.$size.'" value="1"';
							if (is_array($settings['cache_sizes']) && in_array($size, $settings['cache_sizes'])) echo ' checked="checked" ';
							echo ' /> '.ucfirst($size).'<br/>';
						} 
					?>
				</td>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">URL</th>
				<td><input name="flickrAPI_cache_uri" type="text" id="flickrAPI_cache_uri" value="<?php echo $settings['cache_uri']; ?>" size="50" /><br/>
					Could be <code><?php echo trailingslashit(get_option('siteurl')); ?>wp-content/cache/</code> ?</td>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">Full Path</th>
				<td><input name="flickrAPI_cache_path" type="text" id="flickrAPI_cache_path" value="<?php echo $settings['cache_path']; ?>" size="50" /><br/>
					Could be <code><?php echo trailingslashit(realpath("../wp-content/cache")); ?></code> ?</td>
			</tr>
		</table>
		<div class="submit">
			<input type="submit" name="reset_flickrAPI_settings" value="<?php _e('Reset') ?>" />
			<input type="submit" name="save_flickrAPI_settings" value="<?php _e('Save Settings') ?>" class="button-primary" />
		</div>
        
        
        
		<script>
		// Javascript to Hide and Enable fields depending on selection of DIsplay type
		
			(function() {
				var $ = jQuery;
				$(document).ready(function(){
					function uiChange() {
						$("#set, #tags, #userid, #textsearch").hide();
						
						var sel = $("#flickrAPI_type").val();
                        //alert(sel);

						if (sel == "set") {
							$("#set").show();
						}
						if (sel.match(/(user|public)/)) {
							$("#tags").show();
						}
						if (sel == "public") {
							$("#tags").show();
							$("#textsearch").show();
						}
						if (sel.match(/(user|favorite|set|group)/)) {
							$("#userid").show();
							$("#userid_label").text(sel=="group"?"Group ID":"User ID");
						}
						$(".cachesettings")[ $("#flickrAPI_do_cache").attr("checked")?'show':'hide' ]();
					}
					
					
					$("#flickrAPI_type").change(uiChange);
					$("#flickrAPI_do_cache").change(uiChange);
					
					
					uiChange();
					
					$("#idgetter").click(function(event){
						var group = $("#flickrAPI_type").val()=="group";
						
						var x = prompt(
							group?"Enter here the URL of the Group pool:":"Enter here the URL of your Profile or photo pool:", 
							group?"http://flickr.com/groups/your_group/":"http://flickr.com/photos/your_username/"
						);
						if (!x) {
							return false;
						}
						var url = "http://api.flickr.com/services/rest/?"+
						"method="+(group?"flickr.urls.lookupGroup&":"flickr.urls.lookupUser&")+
						"api_key=bed56c11a80c6b68fa62f25ad393a94a&"+
						"format=json&"+
						"jsoncallback=?&"+
						"url="+x;
						$.getJSON(url,
							function(result) {
								if (result.stat != "ok") {
									alert("It seems that there is some kind of problem with the URL you provided. Please, try again.");
									return false;
								}
								$("#flickrAPI_id").val(group?result.group.id:result.user.id);
							}
						);
						return false;
					});
				});
			})();
		</script>
	</form>
</div>