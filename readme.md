# Caldera Forms Booking System
Questo plugin è stato realizzato per creare un sistema di prenotazione sfruttando l'ormai passato Caldera Forms. Il plugin è stato realizzato per un progetto specifico ma è stato pensato per essere riutilizzato in altri progetti. Non è stato testato con altri plugin di prenotazione, ma è stato testato solo con Caldera Forms.
Sfrutta la connessione al database per leggere gli input di un determinato field e controllare se sono già stati inseriti. In caso affermativo, non permette l'inserimento di nuovi valori uguali.

Non è necessario tracciare l'id del form, basta inserire il nome del field che si vuole controllare in quanto univoco. 

Non avendo realizzato un area di amministrazione, è necessario sostiuire l'ID del field manualmente sia nel file php che nel file js.

La soluzione attuale è totalmente customizzabile, lo script js agisce per configurazione su un campo select di Caldera Forms. Il file php è stato pensato per essere riutilizzato in altri progetti, ma è necessario sostituire l'ID del field manualmente come già citato precedentemente per far sì che la query funzioni correttamente.

## Installazione
Basta inserire il plugin nella cartella wp-content/plugins e attivarlo o eventualmente installarlo tramite il pannello di amministrazione di Wordpress assicurandosi di aver compresso la cartella in un file zip.

### Requisiti
* Caldera Forms 1.9.3

Questa è la configurazione su cui è stato realizzato il plugin, non è stato testato su altre versioni.

#### Plugin
* [Caldera Forms](https://wordpress.org/plugins/caldera-forms/)

A breve renderà disponibile una copia della versione di Caldera Forms utilizzata per il progetto sul mio profilo Github.

##### Utilizzo

Assicurarsi di sostuire il prefisso del database nel file php e l'ID del field nel file js.
Bisogna assicurarsi che l'ID sia corretto in quanto quello inserito tramite pannello di amministrazione di Caldera Forms è quello che viene utilizzato per la query ma non l'ID che viene utilizzato per il campo select che nel mio caso corrispondeva all'attributo 'name'.

Quindi: l'ID del campo select visualizzato nel pannello di amministrazione di Caldera Forms è quello che va utilizzato per la query e non quello che viene utilizzato per il campo select.

###### Altre informazioni

Il codice usa wp_enqueue_script per caricare lo script js, quindi è necessario assicurarsi che il file js sia caricato dopo che il file php è stato caricato. Per farlo è stato utilizzato il parametro 'priority' di wp_enqueue_script. Così facendo lo script viene eseguito su tutte le pagine a prescinderer del form che si sta utilizzando. 

Per evitare di usare il parametro 'priority' è possibile utilizzare il filtro 'caldera_forms_render_get_form' per caricare lo script solo quando il form viene caricato. Oppure caricare lo script solo nella pagina in cui si trova il form usando wp_localize_script richiamando il file js solo nella pagina in cui si trova il form.
