jQuery(document).ready(function ($) {
  function getDataSmart1() {
    $.ajax({
      url: './wp-content/plugins/booking-system-caldera-forms-ajax/booking-system-caldera-forms-ajax.php',
      type: 'GET', 
      dataType: 'json',
      success: function(data) {
        dati_js = data;
      }
    });
  }
  
  console.log(dati_js);
  $('#fld_7991005_3_opt1641714, #fld_7991005_3_opt1860754, #fld_7991005_3_opt1238681, #fld_7991005_3_opt1108337, #fld_7991005_3_opt2055191, #fld_7991005_3_opt1209543').click(function () {
    // Chiamata della funzione getData() per effettuare la richiesta AJAX
    getDataSmart1();
    console.log("Evento al click effettuato");
    setTimeout(function () {
      // Itera su ogni elemento dell'array dati_js
      for (let field in dati_js) {
        // Costruzione 'ID del campo select corrispondente
        let fieldId = '#' + field + '_3';

        // Itera su ogni valore dell'array corrente
        for (let i = 0; i < dati_js[field].length; i++) {
          // Seleziona l'opzione del campo select corrispondente al valore corrente
          let option = $(fieldId + ' option[value="' + dati_js[field][i] + '"]');

          // Modifica il testo dell'opzione 
          option.text(option.val() + ' Slot prenotato');

          // Disabilita l'opzione
          option.prop('disabled', true);
          console.log("Opzione disabilitata");
        }
      }
    }, 500);

  });
});

// Path: booking-system-caldera-forms.php

