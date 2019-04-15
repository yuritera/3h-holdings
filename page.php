<?php get_header(); ?>
<div class="ly_wrap">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<article class="content">
  <?php $ttl_image_id = get_post_meta($post -> ID,'ttl_image',true);
  if(!empty($ttl_image_id)){
    $ttl_image = wp_get_attachment_image_src( $ttl_image_id, 'full');
    $class_add = " image_ttl";
    $image_style = " style='background-image:url(".$ttl_image[0].");'";
  }
  ?>
<header id="contentHead" class="content_head<?php echo $class_add; ?>"<?php echo $image_style; ?>>
  <h1 class="content_ttl"><?php the_title(); ?></h1>
</header>
<div class="ly_inner">
<?php
  echo '<main class="content_main">';
  if(is_page('toppage')){
    echo '<div class="home_content">';
  }else{
    echo '<div class="entry-content">';
  }
  the_content();
  echo '</div>';
  echo '</main>';
  endwhile;
endif;
?>
</article>
  </div>
</div>
<?php get_footer(); ?>
