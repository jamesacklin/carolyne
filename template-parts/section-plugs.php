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
      class Plug {
        public $title;
        public $description;
        public $link;
        public $thumbnail;
        public function __construct($title, $description, $link, $thumbnail){
          $this->title = $title;
          $this->description = $description;
          $this->link = $link;
          $this->thumbnail = $thumbnail;
        }
      }
      $plugs = [];
      if (have_rows('section_plugs', 'option')):
        while( have_rows('section_plugs', 'option') ): the_row();
          $type = get_sub_field('type');
          if ($type == 'category'):
            $term = get_sub_field('term_object');
            $name = $term->name;
            $description = $term->description;
            $url = get_term_link($term->term_id);
            $thumbnail = cfi_featured_image_url(array('size' => 'full', 'cat_id' => $term->term_id));
            array_push($plugs, new Plug($name, $description, $url, $thumbnail));
          elseif ($type == 'page'):
            $post = get_sub_field('post_object');
            $title = $post->post_title;
            $description = get_sub_field('post_description');
            $url = get_post_permalink($post->ID);
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            array_push($plugs, new Plug($title, $description, $url, $thumbnail));
          endif;
        endwhile;
      endif;
      foreach ($plugs as &$plug){ ?>
        <div class="section-plug">
          <div class="image" style="background-image: url(<?php echo $plug->thumbnail; ?>);"></div>
          <div class="content">
            <h2><a href="<?php echo($plug->link) ?>"><?php echo($plug->title); ?></a></h2>
            <p><?php echo($plug->description); ?></p>
            <a href="<?php echo $plug->link; ?>" class="button">&mdash;Read More</a>
          </div>
        </div>
      <?php }
    ?>
  </div>
</div>
