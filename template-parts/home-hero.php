<?php
/**
 * The hero section for the home page.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carolyne_Whelan
 */
?>
<div class="home-hero">
  <div class="container">
    <div class="headline">
      <h1><?php bloginfo( 'name' ); ?></h1>
    </div>
    <div class="content">
      <?php
      $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif; ?>
      <p>
        <a href="#" class="button">&mdash;Let's Work Together</a>
      </p>
      <?php if (get_field('support_url', 'option')): ?>
        <a href="<?php echo get_field('support_url', 'option') ?>" class="button support">Support</a>
      <?php endif; ?>
    </div>
  </div>
  <?php if (get_field('homepage_image', 'option')): ?>
    <div class="image" style="background-image: url(<?php echo get_field('homepage_image', 'option') ?>);"></div>
  <?php else: ?>
    <div class="image"></div>
  <?php endif; ?>

</div>
