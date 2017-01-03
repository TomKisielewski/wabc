<?php
/**
 * @package wabc
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("CONTENT_SINGLE"); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php wabc_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

    <?php echo get_the_post_thumbnail( $post->ID ); ?> 

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wabc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wabc_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
