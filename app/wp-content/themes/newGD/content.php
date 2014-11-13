<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="entry">
		<?php if( ! is_attachment() ) : ?>
		<hr>
			<span class="entry-category"><?php the_category( '/' ); ?></span>
		<?php endif; ?>
		<?php if( ! pinboard_post_is_full_width() ) : ?>
			<?php pinboard_post_thumbnail(); ?>
		<?php endif; ?>
		<div class="entry-container">
			<header class="entry-header">
				<?php if( ! is_singular() ) : ?>
			<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<?php endif; ?>
				<<?php pinboard_title_tag( 'post' ); ?> class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></<?php pinboard_title_tag( 'post' ); ?>>
				<?php if( pinboard_post_is_full_width() ) : ?>
					<?php pinboard_entry_meta(); ?>
				<?php endif; ?>
			</header><!-- .entry-header -->
			<?php if( pinboard_post_is_full_width() ) : ?>
				<?php pinboard_post_thumbnail(); ?>
			<?php endif; ?>
			
				<div class="entry-summary">
				<?php if( ! pinboard_is_teaser() ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
				</div><!-- .entry-summary -->
			<div class="clear"></div>
		</div><!-- .entry-container -->
		<?php if( ! pinboard_post_is_full_width() ) : ?>
			<?php pinboard_entry_meta(); ?>
		<?php endif; ?>
		<?php the_tags( $before, $sep, $after ); ?> 
		
	</div><!-- .entry -->
</article><!-- .post -->