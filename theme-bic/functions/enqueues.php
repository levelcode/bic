<?php

function bst_enqueues() {

	/* Styles */

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '3.3.4', null);
	wp_enqueue_style('bootstrap-css');

  	wp_register_style('fawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, null);
	wp_enqueue_style('fawesome-css');

	wp_register_style('styles-css', get_template_directory_uri() . '/assets/css/custom.css', false, null);
	wp_enqueue_style('styles-css');
	
	/* Scripts */

	wp_enqueue_script( 'jquery' );

  	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', false, null, true);
	wp_enqueue_script('modernizr');

  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('html5-js', get_template_directory_uri() . '/assets/js/html5.js', false, null, true);
	wp_enqueue_script('html5-js');

	wp_register_script('bst-js', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
	wp_enqueue_script('bst-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bst_enqueues', 100);
