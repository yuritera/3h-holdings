<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'hhh_holdings');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'admin');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'De5uQvZK');

/** MySQL のホスト名 */
define('DB_HOST', 'hhh-holdings.cgwmb5gsxqmo.ap-northeast-1.rds.amazonaws.com');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}%j{/SIoJvULV[)=`=x}-d{vK)/Wy+XR `zWBx5n<xXkUG6Bc GYR-%F@/D@o~yX');
define('SECURE_AUTH_KEY',  'QvV-4I)?NV,hW[%}o^ZTbd<5C[fD39a:}Yjn[5r|.{oe_V+7uQ|6W.Vej0`S(uUI');
define('LOGGED_IN_KEY',    '5u(F;,P FP4Cp*CU8Wa0SnH=5@w&cMWTLMm-%3MR!&R;;drL~p.+i/NTR0A.td=X');
define('NONCE_KEY',        'z7NUJ:8#:9]r? :IY[$?0B6)F_y+n+#0kRTSF)0t4U=1y_;`j#jlSi78*jU4QHQ:');
define('AUTH_SALT',        '+(Dz6lDOLc=84uuU$M!e{S7x?PE/psNf 2M{5&hOk1^Pg0Qf64.vu:j.d!#;.syf');
define('SECURE_AUTH_SALT', 'Z=?+ :helrvZ{|=3!&*cCb/<SE[DMhN}wp1B]&`/hvE2!Hx$D#*2WupAlyy%6&fB');
define('LOGGED_IN_SALT',   'P/0X9s) 1sc!MjMi9%B*[FurJkAsR#n!ltnmFfq$Bu9gxSB -VwUI]WgZoKK/b=j');
define('NONCE_SALT',       '2z9sLN#kP+RC;69Hqqa|2{;BHp`A_]ff_bSa},$q>W2+~uE~/}u#ACDSE4(g#NhN');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

#define('WP_ALLOW_MULTISITE', true);
#define('FORCE_SSL_ADMIN', true);
#define('WP_CACHE', true);

define('FS_METHOD', 'ftpsockets');
define('FTP_HOST', 'localhost');
define('FTP_USER', 'kusanagi');
#define('FTP_PASS', '*****');

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
