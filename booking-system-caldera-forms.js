jQuery(document).ready(function($) {
  // Selezione del campo select
  var select = $('#fld_5769686_3');
  // Selezione di tutte le opzioni del campo select
  var options = $('option', select);

  // Console di verifica di esecuzione in pagina dello script
  console.log('Lo script di controllo dei dati del form è stato eseguito');
  // Console di verifica dei dati passati da PHP a js
  console.log(dati_js);

  // Per ogni opzione del campo select
  options.each(function() {
    // Console di verifica del valore dell'opzione pre modifica
      console.log('Valore di disabled prima: ' + $(this).prop('disabled'));

      // Se il valore dell'opzione è presente nell'array di dati_js
      if (dati_js.indexOf($(this).val()) !== -1) {
          // Nascondi l'opzione
          $(this).prop('disabled', true);
      }

      // Console di verifica del valore dell'opzione post modifica
      console.log('Valore di disabled dopo: ' + $(this).prop('disabled'));
  });
});

// Path: booking-system-caldera-forms.php