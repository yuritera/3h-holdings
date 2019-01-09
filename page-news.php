<?php get_header(); ?>
<div class="ly_wrap">
  <div class="ly_inner">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<article class="content news">
<header id="contentHead" class="content_head">
  <h1 class="content_ttl"><?php the_title(); ?></h1>
</header>
<?php
$args = array(
    'post_type' => array('post'),
    'nopaging'  => true,
    'posts_per_page'  => '1',
    'ignore_sticky_posts'  => false,
    'order'  => 'ASC',
    'no_found_rows' => true,
);
$first_post = get_posts($args);
$first_post_year = new DateTime($first_post[0] -> post_date);
$first_post_year = $first_post_year->format('Y');
$this_year = date('Y');
echo '<nav class="sp news_select">';
if($first_post_year == $this_year){
    echo '<p class="only_year">'.$this_year.'年</p>';
  }elseif($first_post_year < $this_year){
    echo <<< ELO
  <form class="news_select_form">
      <select name="y" onchange="this.form.submit()" />
ELO;
    for ($i = $first_post_year; $i <= $this_year ; $i++) {
      echo '<option>'.$i.'</option>';
    }
    echo <<< ELO
      </select>
  </form>
ELO;
  }else{
    ;
  }
  echo '</nav>';
?>
<?php
  //パラメータゲット
  if(isset($_GET['y'])){
    $year = $_GET['y'];
  } else {
    $year = date('Y');
  }

$args = array(
  'posts_per_page' => '-1',
  'year' => $year,
	'post_type' => 'post',
	'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
  'no_found_rows' => true,
);
$news = new WP_Query($args);
$post_count = $news->found_posts;

//今年の記事が5件以下の場合は直近5件表示
if($year == date('Y') && $post_count < 5){
  $parm = array(
		'posts_per_page' => 5,
    'post_status' => 'publish',
	  'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'no_found_rows' => true,
    );
  $news = new WP_Query($parm);
}
if ($news->have_posts()):
  echo '<main class="news_main">';
  echo '<ul class="news_list">';
  while($news->have_posts()) : $news->the_post();
    $newslink = get_post_meta($post -> ID ,'news_link',true);
    if(empty($newslink)){
      $newslink = get_the_permalink();
    }
    $date1 = new DateTime(get_post_time( 'Y/m/d', true ));
    $date2 = new DateTime();
    $diff = $date1->diff($date2)->format('%R%a');
    $day = $date1->format('Y/m/d');
    if($diff < 7){
      $new = '<span class="news_new">NEW</span>';
    }else{
      $new = '';
    }
    $txt = get_the_title();
  echo <<< EMO
      <li class="news_item"><a href="{$newslink}">
        <span class="news_day">{$day}</span>
        {$new}
        <span class="news_txt">{$txt}</span>
      </a></li>
EMO;
  endwhile; //sub loop end
  echo '</ul>';
  echo '</main>';
endif;
wp_reset_postdata();
echo '<nav class="pc news_select">';
echo '<p class="news_select_ttl">過去のニュース</p>';
echo '<ul class="news_select_list">';
  for ($i = $first_post_year; $i <= $this_year ; $i++) {
    echo '<li class="news_select_item"><a href="/news/?y='.$i.'">'.$i.'年</a></li>';
  }
  echo '</ul>';
  echo '</nav>';
endwhile;//mein loop end
endif;
?>
</article>
  </div>
</div>
<?php get_footer(); ?>
