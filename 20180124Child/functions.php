<?php //投稿用ファイルを読み込む
get_template_part('functions/create-thread');
?>

<?php //子テーマで利用する関数を書く
 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}


if ( ! function_exists( 'onepress_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function onepress_footer_site_info()
    {
        ?>
  <?php printf(esc_html__('Copyright %1$s %2$s %3$s', 'onepress'), '&copy;', esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
        All Rights Reserved.

        <?php
    }
}
add_action( 'onepress_footer_site_info', 'onepress_footer_site_info' );


