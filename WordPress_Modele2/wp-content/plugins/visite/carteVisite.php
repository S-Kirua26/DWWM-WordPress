<?php 
/* 
Plugin Name: Visite Card 
Description: Permet de gerer une carte de visite 
Author: Steeven 
Version: 1.0 
*/ 

class CarteVisite_Plugin{ 
    public function __construct(){ 
        include_once plugin_dir_path(__FILE__).'/carteClass.php'; 
        register_activation_hook(__FILE__, array('carteClass', 'install'));
        register_deactivation_hook(__FILE__, array('carteClass', 'uninstall'));
        add_action('admin_menu', array($this, 'add_admin_menu'),20);
        add_action('admin_init', array($this, 'register_settings'));
        new CarteClass(); 
    } 
    public function add_admin_menu() { 
        //on ajoute une page dans le menu administrateur 
        add_menu_page('Carte Visite', 'Carte Visite Plugin', 'manage_options', 'helloworld', array($this, 'menu_html')); 
    } 
    
    public function menu_html() { 
        echo '<h1>'.get_admin_page_title().'</h1>'; 
        ?> 
        <form method="post" action="options.php"> 
        <?php settings_fields('helloworld_settings') ?>
            <div>
                <label>Nom et Prénom</label>
                <input type="radio" name="verif_Nom_Prenom" value="Nom-Prenom"/>
            </div></br>
            <div>
                <label>Prénom et Nom</label>
                <input type="radio" name="verif_Nom_Prenom" value="Prenom-Nom"/>
            </div></br>

            <label>Prenom:</label></br>
            <input type="text" name="visite_prenom" value=""/></br>

            <label>Nom:</label></br>
            <input type="text" name="visite_nom" value=""/></br>

            <label>Adresse:</label></br>
            <div>
                <input type="text" name="visite_adresse" value=""/>
                <input type="radio" name="verif_adresse" value="Oui"/>
                <label>Oui</label>
                <input type="radio" name="verif_adresse" value="Non"/>
                <label>Non</label>
            </div>

            <label>Mail:</label></br>
            <div>
                <input type="text" name="visite_mail" value=""/>
                <input type="radio" name="verif_mail" value="Oui"/>
                <label>Oui</label>
                <input type="radio" name="verif_mail" value="Non"/>
                <label>Non</label>
            </div>

            <label>Téléphone</label></br>
            <div>
                <input type="text" name="visite_telephone" value=""/>
                <input type="radio" name="verif_tel" value="Oui"/>
                <label>Oui</label>
                <input type="radio" name="verif_tel" value="Non"/>
                <label>Non</label>
            </div>

            <?php settings_fields('cartevisite_settings') ?>
            <?php submit_button(); ?> 

        </form> 
        <?php
        echo '<h1>'.get_admin_page_title().'</h1>'; 
        echo '<p>Bienvenue sur la page d\'accueil du plugin</p>'; 
    }

    public function register_settings(){
        register_setting('cartevisite_settings', 'verif_Nom_Prenom');
        register_setting('cartevisite_settings', 'verif_adresse');
        register_setting('cartevisite_settings', 'verif_mail');
        register_setting('cartevisite_settings', 'verif_tel');
        global $wpdb;
        $wpdb->insert("{$wpdb->prefix}donneesVisite", array('Nom' => $_POST['visite_nom'],'Prenom' => $_POST['visite_prenom'],'Adresse' => $_POST['visite_adresse'],'Email' => $_POST['visite_mail'],'Tel' => $_POST['visite_telephone']));
    }
} 
new CarteVisite_Plugin();

