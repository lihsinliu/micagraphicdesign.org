<?php get_header(); ?>
<style type="text/css"> #social { display: none; }  </style>
	<div id="container" class="singled">
		<section id="content" <?php pinboard_content_class(); ?>>
			<?php if( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry singled">
						<header class="entry-header">
							<span class="single-category"><?php the_category( '/' ); ?></span><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
							<<?php pinboard_title_tag( 'post' ); ?> class="entry-title"><?php the_title(); ?></<?php pinboard_title_tag( 'post' ); ?>>
							<?php pinboard_entry_meta(); ?>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php if( has_post_format( 'audio' ) ) : ?>
								<p><?php pinboard_post_audio(); ?></p>
							<?php elseif( has_post_format( 'video' ) ) : ?>
								<p><?php pinboard_post_video(); ?></p>
							<?php endif; ?>
							<?php the_content(); ?>
							<div class="clear"></div>
						</div><!-- .entry-content -->
						<footer class="entry-utility">
							<?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'pinboard' ), 'after' => '</p>' ) ); ?>
							<span class="tags">Tags:</span><?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?>
							<?php pinboard_social_bookmarks(); ?>
							<?php pinboard_post_author(); ?>
						</footer><!-- .entry-utility -->
					</div><!-- .entry -->
					<?php comments_template(); ?>
				</article><!-- .post -->
			<?php else : ?>
				<?php pinboard_404(); ?>
			<?php endif; ?>
		</section><!-- #content -->
		<?php if( ( 'no-sidebars' != pinboard_get_option( 'layout' ) ) && ( 'full-width' != pinboard_get_option( 'layout' ) ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div><!-- #container -->
<?php get_footer(); ?>