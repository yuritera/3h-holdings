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
      <p class="mv_txt">日本は、急速な超高齢化により、医療・健康に関わる様々な課題を抱えています。一方、AIやビッグデータといったテクノロジーの進歩や医療技術の高度化や個別化などの医療分野の進歩など、医療に関する環境は、高度化、複雑化、そして広範囲化してきております。<br>
      3Hは、こうした社会の変化に対応し、最新のテクノロジーを活用し、人と企業とをつなぎ、社会の課題を解決していくことで、人が健康で幸せに暮らせる社会の実現に貢献します。</p>
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
