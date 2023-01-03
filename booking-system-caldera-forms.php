<?php
/**
 * Booking system per Caldera Forms
 *
 * @package       BOOKINGSYS
 * @author        Giuseppe Di Chiara
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Booking system per Caldera Forms
 * Plugin URI:    https://giuseppegabrieledichiara.it/projects/booking-system-caldera-forms/
 * Description:   Il plugin aggiunge del codice per rendere dinamica la visualizzazione di alcuni opzioni di un form. Con la configurazione attuale è utile per l'evento 22.#1.2023.
 * Version:       1.0.0
 * Author:        Giuseppe Di Chiara
 * Author URI:    https://giuseppegabrieledichiara.it
 * Text Domain:   booking-system-caldera-forms
 * Domain Path:   /languages
 */


if ( ! defined( 'ABSPATH' ) ) exit;


global $wpdb;

// Query per selezionare gli orari già selezionati per ogni field corrispondente
$fields = array('fld_5769686', 'fld_5961280', 'fld_4116244', 'fld_7088762', 'fld_8159293', 'fld_8928580');

foreach ($fields as $field) {
  $sql = "SELECT value FROM rstar_cf_form_entry_values WHERE field_id = '$field' AND value IS NOT NULL";
  $result = $wpdb->get_results($sql);

  // Creazione di un array 
  $orari_selezionati[$field] = array();
  if (!empty($result)) {
    foreach ($result as $row) {
      $orari_selezionati[$field][] = $row->value;
    }
  }
}

function register_scripts() {
  wp_register_script('booking-system-caldera-forms', plugin_dir_url(__FILE__) . '/booking-system-caldera-forms.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'register_scripts');

function enqueue_scripts() {
  wp_enqueue_script(
    'booking-system-caldera-forms',
    plugins_url('booking-system-caldera-forms.js', __FILE__) . '?ver=' . time(),
    array(),
    false,
    true
);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Passaggio dei dati da PHP a JavaScript con variabile globale
function passa_dati_js() {
  global $orari_selezionati;
  wp_localize_script('booking-system-caldera-forms', 'dati_js', $orari_selezionati);
}
add_action('wp_enqueue_scripts', 'passa_dati_js');

