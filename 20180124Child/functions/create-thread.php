<?php
/**
 * テンプレートが読み込まれる直前で実行される
 */
function _my_create_thread(){
   if(isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'tomsshit')){
	   /* //POSTデータを表示して終了
	    var_dump($_POST);
	    die();
	     */

		//_my_create_threadのif内
		$id = wp_insert_post(array(
		    'post_title' => (string)$_POST['title'],
		    'post_content' => (string)$_POST['content'],
		    'post_status' => 'publish',
		    'post_author' => 3,
		    'post_type' => 'post',
		    'post_category' => array(intval($_POST['cat']))
		), true);
		
		//データの挿入に成功していたら移動
		if(!is_wp_error($id)){
		    //カスタムフィールドurl_rel（参考URL）を追加
		    update_post_meta($id, 'url_ref', $_POST['url']);
		    //ページを移動
		    header('Location: '.get_permalink($id));
		    die();
		}
	}
}
add_action('template_redirect', '_my_create_thread');
?>
