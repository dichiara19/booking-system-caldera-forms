<?php

// file necessari WP
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

add_action( 'wp_ajax_get_data', 'get_data' );
add_action( 'wp_ajax_nopriv_get_data', 'get_data' );

function get_data() {
    // Recupera i dati dell'array dati_js
    global $orari_selezionati;
  
    // Restituisci i dati dell'array come un oggetto JSON
    wp_send_json( $orari_selezionati );
  }
  
