jQuery(document).ready(function ($) {
    console.log(dati_js);
  $('#fld_7991005_3_opt1641714, #fld_7991005_3_opt1860754, #fld_7991005_3_opt1238681, #fld_7991005_3_opt1108337, #fld_7991005_3_opt2055191, #fld_7991005_3_opt1209543').click(function () {
    console.log("Evento al click effettuato");
    setTimeout(function () {
      // Itera su ogni elemento dell'array dati_js
      for (let field in dati_js) {
        // Costruzione 'ID del campo select corrispondente
        let fieldId = '#' + field + '_3';

        for (let i = 0; i < dati_js[field].length; i++) {
          let option = $(fieldId + ' option[value="' + dati_js[field][i] + '"]');

          option.text(option.val() + ' Slot prenotato');

          option.prop('disabled', true);
          console.log("Opzione disabilitata");
        }
      }
    }, 500);

  });
});

// Path: booking-system-caldera-forms.php

