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
 * Description:   Il plugin aggiunge del codice per rendere dinamica la visualizzazione di alcuni opzioni di un form
 * Version:       1.0.0
 * Author:        Giuseppe Di Chiara
 * Author URI:    https://giuseppegabrieledichiara.it
 * Text Domain:   booking-system-caldera-forms
 * Domain Path:   /languages
 */


if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

/*
* 1. Modifica il nome della tabella wp_ con il tuo prefisso
* 2. Modifica il valore dell'ID del campo con il tuo (vedi readme.md)
*/

// Query per selezionare gli input ricevuti
$sql = "SELECT value FROM wp_cf_form_entry_values WHERE field_id = 'fld_5769686' AND value IS NOT NULL";
$result = $wpdb->get_results($sql);

// Creazione di un array per memorizzare gli input ricevuti in un array
$orari_selezionati = array();
if (!empty($result)) {
  foreach ($result as $row) {
    $orari_selezionati[] = $row->value;
  }
}

// Registrazione del tuo script Javascript che nasconderà gli orari già selezionati
function register_scripts() {
  wp_register_script('booking-system-caldera-forms', plugin_dir_url(__FILE__) . '/booking-system-caldera-forms.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'register_scripts');

// Inserimento del tuo script
function enqueue_scripts() {
  wp_enqueue_script('booking-system-caldera-forms');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Passaggio dei dati da PHP a JavaScript
function passa_dati_js() {
  global $orari_selezionati;
  wp_localize_script('booking-system-caldera-forms', 'dati_js', $orari_selezionati);
}
add_action('wp_enqueue_scripts', 'passa_dati_js');

