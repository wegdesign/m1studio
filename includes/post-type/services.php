<?php
function services_post() { 
    // creazione (registrazione) del custom post type
    register_post_type( 'services', /* nome del custom post type */
        // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
        array('labels' => array(
            'name' => 'Servizi', /* Nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'Servizio', /* Nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutti i Servizi', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi nuovo Servizio', /* Testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica Servizio', /*  Testo per modifica */
            'new_item' => 'Nuovo Servizio', /* Testo per nuovo oggetto */
            'view_item' => 'Visualizza Servizio', /* Testo per visualizzare */
            'search_items' => 'Cerca Servizio', /* Testo per la ricerca*/
            'not_found' =>  'Nessun Servizio trovato', /* Testo per risultato non trovato */
            'not_found_in_trash' => 'Nessun Servizio trovato nel cestino', /* Testo per risultato non trovato nel cestino */
            'parent_item_colon' => ''
            ), /* Fine dell'array delle etichette */   
            'description' => 'Raccolta di Servizi del portale', /* Una breve descrizione del post type */
            'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
            'publicly_queryable' => true, /* Definisce se possono essere fatte query da front-end */
            'exclude_from_search' => false, /* Definisce se questo post type è escluso dai risultati di ricerca */
            'show_ui' => true, /* Definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
            'query_var' => true,
            'menu_position' => 8, /* Definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
            'menu_icon' => '', /* Scegli l'icona da usare nel menù per il posty type */
            'rewrite'   => array( 'slug' => 'services', 'with_front' => false ), /* Puoi specificare uno slug per gli URL */
            'has_archive' => 'true', /* Definisci se abilitare la generazione di un archivio (equivalente di archive-libri.php) */
            'capability_type' => 'post', /* Definisci se si comporterà come un post o come una pagina */
            'hierarchical' => false, /* Definisci se potranno essere definiti elementi padri di altri */
            /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
            'supports' => array( 'title', 'editor')
        ) /* fine delle opzioni */
    ); /* fine della registrazione */
 
} 

function add_menu_icons_service(){ ?>

	<style>
		#adminmenu .menu-icon-services div.wp-menu-image:before {
  			content: '\f145';	
		}
	</style>
<?php
}



// Inizializzazione della funzione
add_action( 'init', 'services_post');
//change menu icon
add_action( 'admin_head', 'add_menu_icons_service' );
 




 
?>