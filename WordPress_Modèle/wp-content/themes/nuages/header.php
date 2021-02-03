<!DOCTYPE html> 
<html lang="fr"> 
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="description" content=""> 
        <meta name="author" content=""> 
        <title>On essaye de créer notre thème Wordpress</title> <!-- CSS de Bootstrap --> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> <!-- Ajout d'une nouvelle feuille de style qui sera spécifique à notre thème --> 
        <link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet"> <!-- HTML5 shim et Respond.js pour supporter les éléments HTML5 pour Internet Explorer 8 --> <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]--> 
        <?php wp_head(); ?> 
    </head> 
    
    <body> 
        <div class="colonne contenu">
            <div class="header"> 
                <div class="container"> 
                    <nav class ="size" id="navigation-principale centre" role="navigation"> 
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-principal' ) ); ?>  
                    </nav> 
                </div> 
            </div> 
        <div>

        <div class="container"> 
            <div class="blog-header"> 
            <?php get_search_form(); ?> <!-- permet d'ajouter une barre de recherche -->
                <h1 class="blog-title"><a class="centre" href="<?php echo get_bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>  <!-- ajoute un lien vers la page d'accueil -->
                <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
            </div>
       