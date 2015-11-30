<?php
function promos_post() { 
    // creazione (registrazione) del custom post type
    register_post_type( 'promos', /* nome del custom post type */
        // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
        array('labels' => array(
            'name' => 'Promo', /* Nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'Promo', /* Nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutti i Promo', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi nuovo Promo', /* Testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica Promo', /*  Testo per modifica */
            'new_item' => 'Nuovo Promo', /* Testo per nuovo oggetto */
            'view_item' => 'Visualizza Promo', /* Testo per visualizzare */
            'search_items' => 'Cerca Promo', /* Testo per la ricerca*/
            'not_found' =>  'Nessun Promo trovato', /* Testo per risultato non trovato */
            'not_found_in_trash' => 'Nessun Promo trovato nel cestino', /* Testo per risultato non trovato nel cestino */
            'parent_item_colon' => ''
            ), /* Fine dell'array delle etichette */   
            'description' => 'Raccolta di Promo del portale', /* Una breve descrizione del post type */
            'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
            'publicly_queryable' => true, /* Definisce se possono essere fatte query da front-end */
            'exclude_from_search' => false, /* Definisce se questo post type è escluso dai risultati di ricerca */
            'show_ui' => true, /* Definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
            'query_var' => true,
            'menu_position' => 9, /* Definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
            'menu_icon' => '', /* Scegli l'icona da usare nel menù per il posty type */
            'rewrite'   => array( 'slug' => 'promos', 'with_front' => false ), /* Puoi specificare uno slug per gli URL */
            'has_archive' => 'true', /* Definisci se abilitare la generazione di un archivio (equivalente di archive-libri.php) */
            'capability_type' => 'post', /* Definisci se si comporterà come un post o come una pagina */
            'hierarchical' => false, /* Definisci se potranno essere definiti elementi padri di altri */
            /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
            'supports' => array( 'title', 'editor', 'thumbnail')
        ) /* fine delle opzioni */
    ); /* fine della registrazione */
} 

// Inizializzazione della funzione
add_action( 'init', 'promos_post');
 
?>