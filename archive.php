<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carolyne_Whelan
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<div class="posts-header archive-header">
				<?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					$cat_id = get_query_var('cat');
				?>

				<div class="image" style="background-image: url(<?php echo cfi_featured_image_url( array( 'size' => 'full', 'cat_id' => $cat_id ) ); ?>)"></div>
			</div><!-- .posts-header -->
			<div class="container">
				<div class="posts-list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_pagination( array(
						'screen_reader_text' => ' ',
						'prev_text'          => __( 'Previous', 'twentyfifteen' ),
						'next_text'          => __( 'Next', 'twentyfifteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'nieuwedruk' ) . ' </span>',
					));

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/section-plugs'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
