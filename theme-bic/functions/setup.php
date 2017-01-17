<?php

function bst_setup() {
	add_editor_style('css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 470);
	update_option('large_size_w', 970);
}
add_action('init', 'bst_setup');

if (! isset($content_width))
	$content_width = 600;

function bst_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'bst') . ' <i class="glyphicon glyphicon-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'bst_excerpt_readmore');

// Browser detection body_class() output

function bst_browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);
		if ($browser == "MSIE 7.0"  ) {
			$classes[] = 'ie7';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 6.0" ) {
			$classes[] = 'ie6';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 8.0" ) {
			$classes[] = 'ie8';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 9.0" ) {
			$classes[] = 'ie9';
			$classes[] = 'ie';
		} else {
	            $classes[] = 'ie';
	        }
	}
	else $classes[] = 'unknown';

	if( $is_iphone ) $classes[] = 'iphone';

	return $classes;
}
add_filter( 'body_class', 'bst_browser_body_class' );

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

// Bootstrap pagination

if ( ! function_exists( 'bst_pagination' ) ) {
	function bst_pagination() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
			'prev_text' => __('<i class="glyphicon glyphicon-chevron-left"></i> Newer'),
			'next_text' => __('Older <i class="glyphicon glyphicon-chevron-right"></i>'),
			'type' => 'list'
		) );
		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='active'><a href='#'>", $paginate_links );
		$paginate_links = str_replace( "</span>", "</a>", $paginate_links );
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
}

/* === Add Thumbnails to Posts/Pages List === */
if ( !function_exists('o99_add_thumbs_column_2_list') && function_exists('add_theme_support') ) {

 //  // set your post types , here it is post and page...
 add_theme_support('post-thumbnails', array( 'post', 'page' ) );

 function o99_add_thumbs_column_2_list($cols) {

		 $cols['thumbnail'] = __('Thumbnail');

		 return $cols;
 }

 function o99_add_thumbs_2_column($column_name, $post_id) {

				 $w = (int) 60;
				 $h = (int) 60;

				 if ( 'thumbnail' == $column_name ) {
						 // back comp x WP 2.9
						 $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
						 // from gal
						 $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
						 if ($thumbnail_id)
								 $thumb = wp_get_attachment_image( $thumbnail_id, array($w, $h), true );
						 elseif ($attachments) {
								 foreach ( $attachments as $attachment_id => $attachment ) {
										 $thumb = wp_get_attachment_image( $attachment_id, array($w, $h), true );
								 }
						 }
								 if ( isset($thumb) && $thumb ) {
										 echo $thumb;
								 } else {
										 echo __('None');
								 }
				 }
 }

	 // for posts
	 add_filter( 'manage_posts_columns', 'o99_add_thumbs_column_2_list' );
	 add_action( 'manage_posts_custom_column', 'o99_add_thumbs_2_column', 10, 2 );

	 // for pages
	 add_filter( 'manage_pages_columns', 'o99_add_thumbs_column_2_list' );
	 add_action( 'manage_pages_custom_column', 'o99_add_thumbs_2_column', 10, 2 );
	}

	add_action( 'add_meta_boxes', 'o99_add_attach_thumbs_meta_b' );

	function o99_add_attach_thumbs_meta_b (){

	add_meta_box ('att_thumb_display', 'Imágen adjunta','o99_render_attach_meta_b','post');

}

function o99_render_attach_meta_b( $post ) {
		$output = '';
		$args = array(
		        'post_type' => 'attachment',
		        'post_mime_type' => 'image',
		        'post_parent' => $post->ID
		    );
		    //
		    // uncomment if you want ordered list
		    //
		    // $output .= '<ul>';
		     $images = get_posts( $args );
		    foreach(  $images as $image) {
		    //$output .= '<li>';
		        $output .= '<a href="'.wp_get_attachment_url( $image->ID ).'" target="_blank"><img src="' . wp_get_attachment_thumb_url( $image->ID ) . '" /></a>';
		        //$output .= '</li>';
		    }
		   // $output .= '</ul>';
		  echo $output;
}

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="Your Site NAME Goes HERE"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image="http://example.com/image.jpg"; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
