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
				<?php endif; ?>
			</header><!-- .entry-header -->
			<?php if( pinboard_post_is_full_width() ) : ?>
				<?php pinboard_post_thumbnail(); ?>
			<?php endif; ?>
			<?php if( ! is_category( pinboard_get_option( 'portfolio_cat' ) ) && ! ( is_category() && cat_is_ancestor_of( pinboard_get_option( 'portfolio_cat' ), get_queried_object() ) ) ) : ?>
				<div class="entry-summary">
				<?php if( ! pinboard_is_teaser() ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
				</div><!-- .entry-summary -->
			<?php endif; ?>
			<div class="clear"></div>
		</div><!-- .entry-container -->
		<?php if( ! pinboard_post_is_full_width() ) : ?>
		<?php endif; ?>
		<!-- <?php the_tags( $before, $sep, $after ); ?> -->   <!-- Doesn't seem like tags are actively used...-->

	</div><!-- .entry -->
</article><!-- .post -->