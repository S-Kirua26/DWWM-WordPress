<?php 
/* 
Plugin Name: Mon Image 
Description: Permet d'ajouter une image grâce à un plugin
Author: Steeven 
Version: 1.0 
*/ 

class AfficheImage_Plugin{ 
    public function __construct(){ 
        add_action('admin_menu', array($this, 'add_admin_menu'),20);
        // add_action('admin_init', array($this, 'register_settings'));
    } 
    public function add_admin_menu() { 
        //on ajoute une page dans le menu administrateur 
        add_menu_page('Mon Image', 'Mon Image', 'manage_options', 'helloworld', array($this, 'menu_html')); 
    } 
    
    public function menu_html() { 
        echo '<h1>'.get_admin_page_title().'</h1>'; 
        ?> 
        <form method="post" action="options.php"> 
        <?php settings_fields('helloworld_settings') ?>

        <?php
            echo '<div class="image"><img src="'.plugins_url('afficheImage/Image/loup.jpeg').'" alt=""></div>';
        ?>

        </form> 
        <?php
        echo '<p>Bienvenue sur la page d\'accueil du plugin</p>'; 
    }

    // public function register_settings(){
    //     register_setting('AfficheImage_settings', 'verif_Nom_Prenom');
    //     register_setting('AfficheImage_settings', 'verif_adresse');
    //     register_setting('AfficheImage_settings', 'verif_mail');
    //     register_setting('AfficheImage_settings', 'verif_tel');
    //     global $wpdb;
    //     $wpdb->insert("{$wpdb->prefix}donneesVisite", array('Nom' => $_POST['visite_nom'],'Prenom' => $_POST['visite_prenom'],'Adresse' => $_POST['visite_adresse'],'Email' => $_POST['visite_mail'],'Tel' => $_POST['visite_telephone']));
    // }
} 
new AfficheImage_Plugin();