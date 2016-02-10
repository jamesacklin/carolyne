<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carolyne_Whelan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-image">
		<figure>
			<?php
				if (has_post_thumbnail()){
					the_post_thumbnail();
				} else {
					// See functions.php for the 'category-featured-images' plugin :)
				}
			?>
		</figure>
	</div>
	<?php if (is_single()) echo "<div class='container'>"; ?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			Posted on <?php the_time('F j, Y'); ?> at <?php the_time('g:i A'); ?> in <strong><?php the_category(', '); ?></strong>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if (is_front_page() || is_archive() ):
			the_excerpt();
		elseif ( !is_front_page() ) :
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'carolynepress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'carolynepress' ),
				'after'  => '</div>',
			) );
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php carolynepress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php if (is_single()) echo "</div>"; ?>
</article><!-- #post-## -->
