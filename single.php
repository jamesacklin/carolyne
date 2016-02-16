<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Carolyne_Whelan
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
			?>
			<div class='container container-post-nav'>
				<?php $prev_post = get_previous_post(); if($prev_post) : ?>
				<div class="nav-previous">
					<div class="thumbnail">
						<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array(150,150)); ?></a>
					</div>
					<?php previous_post_link( '<h2>' . __( 'Previous', 'theme' ) . '</h2>%link', _x( '%title', 'Previous post link', 'theme' ) ); ?>
				</div>
				<?php endif ; ?>

				<?php $next_post = get_next_post(); if($next_post) : ?>
				<div class="nav-next">
					<?php next_post_link( '<h2>' . __( 'Next', 'theme' ) . '</h2>%link', _x( '%title', 'Next post link', 'theme' ) ); ?>
					<div class="thumbnail">
						<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array(150,150)); ?></a>
					</div>
				</div>
				<?php endif ; ?>
			</div>

			<?php echo "<div class='container container-comments'>";
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			echo "</div>";

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
