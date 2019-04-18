<?php
get_template_part('lib/init');//初期設定
get_template_part('lib/admin_func');//管理画面設定用
get_template_part('lib/custom_menu');//カスタムメニュー設定
get_template_part('lib/temp_func');//テンプレに関する関数（ショートコード・パラメータ）

//抜粋文字数
function custom_excerpt_length( $length ) {
return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more($more) {
return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*検索でカスタム投稿を除外*/
function search_exclude_custom_post_type( $query ) {
  if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'post_type', array( 'post', 'page' ) );
  }
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
  if($post_type == 'post'){
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
      $year = date('Y');
      $month = date('m');
      $day = date('d');
      $args = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'date_query' => array(
          array(
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'compare' => '='
          )
          ),
          'no_found_rows' => false,
      );
      $slug_posts = get_posts($args);
      $slug_posts_num = count($slug_posts);
      if($slug_posts_num > 0){
        $slug_posts_num += 1;
        $slug = $year.$month.$day.'_'.$slug_posts_num;
      }else{
        $slug = $year.$month.$day;
      }
    }
  }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
add_theme_support('custom-header');
add_filter( 'wp_insert_post_data', function ( $data ) {
	if ( isset( $_GET['meta-box-loader'] ) ) {
		unset( $data["post_modified"] );
		unset( $data["post_modified_gmt"] );
	}

	return $data;
} );

add_action( 'customize_register', 'theme_customize' );

function theme_customize($wp_customize){

$wp_customize->add_section( 'logo_section', array(
  'title' => 'テーマ設定',
  'priority' => 59,
  'description' => 'ロゴ画像・メインビジュアルのテキストが変更できます。',
));
$wp_customize->add_setting( 'logo_url' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
    'label' => 'ロゴ画像',
    'section' => 'logo_section',
    'settings' => 'logo_url',
    'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。',
  )));
$wp_customize->add_setting( 'mv_txt' );
$wp_customize->add_control( 'mv_txt', array(
  'settings'  => 'mv_txt',
  'label'     => 'メインビジュアルのテキストを入力してください。',
  'section'   => 'logo_section',
  'type'      => 'textarea',
));
}

?>
