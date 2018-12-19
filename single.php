<?php get_header(); ?>
<div class="ly_wrap">
  <div class="ly_inner">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="content_ttl"><?php the_title(); ?></h1>
</header>
<?php
  echo '<main class="content_main">';
  echo '<div class="entry-content">';
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
