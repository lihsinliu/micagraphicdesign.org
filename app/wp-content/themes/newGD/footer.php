</div><!-- #wrapper -->
<div id="social">
		<a href="https://twitter.com/MICA_GD" target="_blank" name="Twitter" title="Twitter">L</a>
		<a href="http://micagraphicdesign.tumblr.com/" target="_blank" name="Tumblr" title="Tumblr">O</a>
		<a href="http://vimeo.com/micagd" target="_blank" name="Vimeo" title="Vimeo">V</a>
		<a href="http://portfolios.mica.edu/search?mica_major=797&field=&content=projects&sort=&time=week" target="_blank" name="Behance" title="Behance">E</a>
		<a href="http://flickr.com/groups/gdmica" target="_blank" name="Flickr" title="Flickr">N</a>
</div><!--end social-->
	</div><!-- #all -->
		<?php if( is_front_page() || is_page_template( 'template-landing-page.php' ) || ( is_home() && ! is_paged() ) ) : ?>
			<?php get_sidebar( 'footer-wide' ); ?>
		<?php endif; ?>
		<div id="footer">
			<div id="footWrap">
				<a href="http://www.mica.edu" target="_blank" title="MICA.edu">MICA.edu</a>
				<a href="http://micadesign.org/" target="_blank" title="GD MFA">GD MFA</a>
				<a href="http://micagraphicdesignpb.org/" target="_blank" title="post-bac">Post-Bac GD</a>
				<a href="mailto:bhorne@mica.edu?Subject=hey%20there%20MICA%20GD" target="_blank" title="Contact">Contact</a>
				<p class="copyright">© Maryland Institute College of Art</p>
			</div><!-- #footWrap -->
		</div><!-- #footer -->
	
<?php wp_footer(); ?>
</body>
</html>