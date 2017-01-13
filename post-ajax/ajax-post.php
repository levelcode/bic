<?php
/**
 * Plugin Name: Post Ajax
 * Plugin URI: http://levelcode.com
 * Description: Permite a los usuarios crear posts via ajax
 * Version: 1.0.0
 * Author: Levelcode - Camilo Vanegas
 * Author URI: http://levelcode.com
 * License: GPL2
 */

 define('APFSURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
 define('APFPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );

 //Se instancian los scripts
 function apf_enqueuescripts()
 {
     wp_enqueue_script('apf', APFSURL.'/js/up-script.js', array('jquery'));
     wp_localize_script( 'apf', 'apfajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
 }
 add_action('wp_enqueue_scripts', apf_enqueuescripts);

 //Lectura post
 function apf_addpost() {

   //Variables post
   $title = $_POST['title'];
   $nombreArtista = $_POST['name-art'];
   $nombreResponsable = $_POST['dad'];
   $documento = $_POST['id-card'];
   $correo = $_POST['email'];
   $telefono = $_POST['tel'];
   $categoria = $_POST['category'];

   //Conditional for duplicate post

   if (!get_page_by_title($title, 'OBJECT', 'post') ){

   }else{
       $error = "El Nombre de post ya existe";
   }
   
 }

 // Llamado ajax api wordpress
 add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
 add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );
