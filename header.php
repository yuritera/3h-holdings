<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/website#">

  <title><?php the_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="theme-color" content="#008cb1">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">

  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">

  <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
  <link rel="dns-prefetch" href="//code.jquery.com">
  <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
  <link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
  <link rel="dns-prefetch" href="//tpc.googlesyndication.com">
  <link rel="dns-prefetch" href="//www.gstatic.com">
  <link rel="dns-prefetch" href="//twitter.com">
  <link rel="dns-prefetch" href="//api.b.st-hatena.com">
  <link rel="dns-prefetch" href="//urls.api.twitter.com">
  <link rel="dns-prefetch" href="//graph.facebook.com">

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="<?php echo get_template_directory_uri(); ?>/js/picturefill.min.js"></script>

  <?php wp_head(); ?>

  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

</head>
<body class="<?php if(is_home()){echo 'home ';} ?>">
<div id="fb-root"></div>
<header class="ly_header">
<div class="ly_inner">
  <?php if(is_home()){echo '<h1'; }else{ echo '<p'; } ?> class="header_logo"><a href="<?php echo home_url( '/' ); ?>">
  <img src="<?php echo get_template_directory_uri(); ?>/images/sitelogo.png" alt="３H">
  </a><?php if(is_home()){echo '</h1>'; }else{ echo '</p>'; } ?>
  <nav class="header_navi">
    <ul class="header_navi_list">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'topnavi',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
  </nav>
</div>
</header>
