<?php
/**
 *Template Name: Frontpage
 *
 * @package OnePress
 */

get_header(); ?>
<form action="<?php the_permalink();?>" method="post">
        <?php wp_nonce_field('tomsshit'); ?>
     
<table class="form-table">
         
<tbody>
         
<tr>
             
<th><label for="title">タイトル</label></th>
 
             
<td><input id="title" type="text" name="title" value=""/></td>
 
        </tr>
 
         
<tr><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span>
             
<th><label for="content">本文</label></th>
 
             
<td><textarea id="content" name="content"></textarea></td>
 
        </tr>
 
         
<tr>
             
<th><label>カテゴリー</label></th>
 
             
<td><?php wp_dropdown_categories(); ?></td>
 
        </tr>
 
         
<tr>
             
<th><label for="url">参考URL</label></th>
 
             
<td><input id="url" type="text" name="url" value=""/></td>
 
        </tr>
 
        </tbody>
 
    </table>
 
    <input type="submit" value="投稿する"/>
    </form>

	<div id="content" class="site-content">
		<main id="main" class="site-main" role="main">
            <?php

            do_action( 'onepress_frontpage_before_section_parts' );

			if ( ! has_action( 'onepress_frontpage_section_parts' ) ) {

				$sections = apply_filters( 'onepress_frontpage_sections_order', array(
                    'features', 'about', 'services', 'videolightbox', 'gallery', 'counter', 'team',  'news', 'contact'
                ) );

				foreach ( $sections as $section ){
                    onepress_load_section( $section );
				}

			} else {
				do_action( 'onepress_frontpage_section_parts' );
			}

            do_action( 'onepress_frontpage_after_section_parts' );

			?>
		</main><!-- #main -->
	</div><!-- #content -->

<?php get_footer(); ?>
