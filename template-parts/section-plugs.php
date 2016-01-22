<?php
/**
 * Template part for plugging various categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carolyne_Whelan
 */
?>

<div class="section-plugs">
  <div class="container">
    <?php
      $items = wp_get_nav_menu_items( '2', $args );
      foreach ($items as $item):
        $real_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
        $type = $item->object;
        $url = $item->url;
        $thumbnail = get_the_post_thumbnail_url($real_id, 'large');
        if ($thumbnail == ""):
          $category_id = get_the_category($real_id);
          $thumbnail = get_the_post_thumbnail_url($category_id, 'large');
        endif;
        if ($type == "page"):
          $title = get_the_title($real_id);
          $description = get_first_paragraph($real_id);
        elseif ($type == "category"):
          $title = get_cat_name($real_id);
          $description = category_description($real_id);
        endif;
    ?>
      <div class="section-plug">
        <div class="image" style="background-image: url(<?php echo $thumbnail; ?>);"></div>
        <div class="content">
          <h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
          <?php echo $description; ?>
          <a href="<?php echo $url; ?>" class="button">&mdash;Read More</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
