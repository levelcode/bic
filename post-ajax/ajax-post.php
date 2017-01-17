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

 //Lectura post
function addpost() {
   echo "hola";
   var_dump($_FILES);

   var_dump($_POST);

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

   //add post
   $post_id = wp_insert_post( array(
       'post_title'        => $title,
       'post_status'       => 'publish',
       'post_author'       => '2',
       'post_category'     => array($categoria)
   ));

   if ( $post_id != 0 )
    {
        $results = '*Post Added';
    }
    else {
        $results = '*Error occurred while adding the post';
    }

   //Update meta-data__comments
   update_post_meta($post_id,'Correo',$correo);
   update_post_meta($post_id,'Celular',$telefono);
   update_post_meta($post_id,'Documento',$documento);
   update_post_meta($post_id,'Nombre',$nombreArtista);
   update_post_meta($post_id,'Responsable',$nombreResponsable);
   //get permalink

   $link_post = get_permalink($post_id);

   agp_process_woofile($fotoDibujo, $post_id, true );
   agp_process_woofile($fotoArtista, $post_id);

   die($results);
}

//Function for upload files
function agp_process_woofile ( $file, $post_id = 0 , $set_as_featured = false ) {

    $upload = wp_upload_bits( $file['name'], null, file_get_contents( $file['tmp_name'] ) );

    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );

    $wp_upload_dir = wp_upload_dir();

    $attachment = array(
        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $upload['file'], $post_id );

    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    if( $set_as_featured == true ) {
        update_post_meta( $post_id, '_thumbnail_id', $attach_id );
    }
}

 add_action('wp_enqueue_scripts', 'apf_enqueuescripts');
 add_action( 'wp_ajax_nopriv_apf_addpost', 'addpost' );
 add_action( 'wp_ajax_apf_addpost', 'addpost' );
