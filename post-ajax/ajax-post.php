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
   $fotoDibujo = $_FILES['file-draw'];
   $fotoArtista = $_FILES['file-photo'];
   //Upload files


   //Conditional for duplicate post

   if (!get_page_by_title($title, 'OBJECT', 'post') ){

     //add post
     $post_id = wp_insert_post( array(
         'post_title'        => $title,
         'post_status'       => 'publish',
         'post_author'       => '2'
     ));

     //Update meta-data__comments
     update_post_meta($post_id,'Correo',$correo);
     update_post_meta($post_id,'Celular',$telefono);
     update_post_meta($post_id,'Documento',$documento);
     update_post_meta($post_id,'Nombre',$nombreArtista);
     update_post_meta($post_id,'Responsable',$nombreResponsable);
     //get permalink

     $link_post = get_permalink($post_id);

     agp_process_woofile($fotoDibujo, $post_id, $nombreArtista);
     agp_process_woofile($fotoArtista, $post_id, $nombreArtista );

   }else{
       $error = "El Nombre de post ya existe";
   }
 }


 //Function for upload files
 function agp_process_woofile($files, $post_id, $caption){
     require_once(ABSPATH . "wp-admin" . '/includes/image.php');
     require_once(ABSPATH . "wp-admin" . '/includes/file.php');
     require_once(ABSPATH . "wp-admin" . '/includes/media.php');

     $attachment_id = media_handle_upload($files, $post_id);

     $attachment_url = wp_get_attachment_url($attachment_id);
     add_post_meta($post_id, '_file_paths', $attachment_url);

     $attachment_data = array(
       'ID' => $attachment_id,
       'post_excerpt' => $caption
     );

     wp_update_post($attachment_data);

     return $attachment_id;
 }

 // Llamado ajax api wordpress
 add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
 add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );
