<?php get_header(); ?>
<div class="ly_wrap">
<?php
$header_img = get_header_image();
$title_bg = "style=''";
if (!empty($header_img)) {
	$title_bg = " style='background-image:url(".$header_img.");'";
}
?>
<section class="ly_mv mv"<?php echo $title_bg; ?>>
  <div class="mv_bg">
    <div class="ly_inner">
      <h2 class="mv_ttl">3Hについて</h2>
      <p class="mv_txt">健康（Health）とは、そのヒト（Human）自身が身体的、精神的、経済的、環境的に満たされていると認識している状態にあることを言い、健康な状態においてヒトは、幸せ（Happiness）を感じることができます。「3H」とはこの三つのHが組み合わさったものであり、ヒトの健康と幸せにおける社会的課題の解決に貢献することを表しています。</p>
    </div>
  </div>
</section>
<div class="ly_inner">
<section class="topnews">
  <h2 class="topnews_ttl">News</h2>
    <ul class="topnews_list">
    <?php
    function newsAdd($newsid,$day,$txt){
      $date1 = new DateTime($day);
      $date2 = new DateTime();
      $diff = $date1->diff($date2)->format('%R%a');
      $day = $date1->format('Y/m/d');
      if($diff < 7){
        $new = '<span class="topnews_new">NEW</span>';
      }else{
        $new = '';
      }
      $newslink = get_post_meta($newsid,'news_link',true);
      if(empty($newslink)){
        $newslink = get_the_permalink( $newsid );
      }
      $news_li = <<< EMO
      <li class="topnews_item"><a href="{$newslink}">
        <span class="topnews_day">{$day}</span>
        {$new}
        <span class="topnews_txt">{$txt}</span>
      </a></li>
EMO;
      return $news_li;
    }
    $args=array(
      'post_type' => array('post'),
      'posts_per_page'=> 5,
      'no_found_rows' => true,
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'news_headline',
          'value' => 'true',
          'compare' => '='
        )
      ),
        );
    $hot_topics = get_posts($args);
    foreach ($hot_topics as $hot_topic) {
      //idを格納
      $hot_topic_ids[] = $hot_topic -> ID;
      //リスト表示
      echo newsAdd($hot_topic -> ID,$hot_topic -> post_date ,$hot_topic -> post_title);
    }
    $hot_topics_count = count($hot_topics);
    if(!empty($hot_topics_count)){$hot_topics_count = 0;}
    $news_count = 5 - $hot_topics_count;
    $args=array(
      'post_type' => array('post'),
      'posts_per_page'=> $news_count,
      'no_found_rows' => true,
      'post__not_in' => $hot_topic_ids,
      );
    $news_topics = get_posts($args);
    foreach ($news_topics as $news_topic) {
      //リスト表示
      echo newsAdd($news_topic -> ID,$news_topic -> post_date ,$news_topic -> post_title);
    }
    ?>
    </ul>
    <p class="topnews_more"><a href="/news">一覧を見る</a></p>
</section>
<section class="home_content">
<?php
$page_data = get_page_by_path('toppage'); $page = get_post($page_data);
echo $page -> post_content;
?>
</section>
</div><!--inner-->
</div><!--wrap-->
<?php get_footer(); ?>
