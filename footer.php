<div class="ly_footer">
  <div class="ly_inner ft_wrap">
  <div class="ft_box">
    <ul class="ft_navi_list ftnavi1" id="ftNaviList">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'ftnavi1',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
  </div>
  <div class="ft_box">
    <ul class="ft_navi_list ftnavi2" id="ftNaviList2">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'ftnavi2',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
  </div>
  <div class="ft_box">
    <ul class="ft_navi_list ftnavi3" id="ftNaviList3">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'ftnavi3',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
  </div>
  <div class="ft_box">
    <ul class="ft_navi_list submenu">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'ftnavi4',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
    <p class="iso_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/iso_logo.png" alt=""></p>
    <div class="address">
      <p class="address_ttl">住所</p>
      <p class="address_txt">〒171-0022<br>東京都豊島区南池袋1-13-23<br>池袋YSビル2F</p>
      <p class="address_txt">代表電話：03-5953-2108</p>
      <p class="address_tct"><a href="">アクセスはこちら</a></p>
    </div>
  </div>
  </div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/base.js"></script>
</body>
</html>
