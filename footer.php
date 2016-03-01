<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carolyne_Whelan
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container columns">
			<div class="column">
				<p>
					Carolyne Whelan is a freelance writer with a knack for poetry and adventure, who loves helping companies and individuals find their voice and their audience. She's been awarded fellowships to the Vermont Studio Center, Squaw Valley Community of Writers, Stockton College Writing Workshop, and the flagship Writing Walking Women conference in Newfoundland, Canada. Her first book, <em>The Glossary of Tania Aebi</em>, was published by Finishing Line Press. She's available for copywriting, content marketing, consulting, and education opportunities.
				</p>
			</div>
			<div class="column">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
