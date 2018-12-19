<div class="ly_footer">
  <div class="ly_inner ft_wrap">
  <div class="ft_box">
    <ul class="ft_navi_list">
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
    <ul class="ft_navi_list">
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
    <ul class="ft_navi_list">
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
  </div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/base.js"></script>
</body>
</html>
