<?php 
/* 
Plugin Name: Horaire 
Description: Permet de gerer des horaires
Author: Steeven 
Version: 1.0 
*/ 

class Horaires_Plugin{ 
    public function __construct(){ 
        include_once plugin_dir_path(__FILE__).'/horairesClass.php'; 
        register_activation_hook(__FILE__, array('horairesClass', 'install'));
        register_deactivation_hook(__FILE__, array('horairesClass', 'uninstall'));
        add_action('admin_menu', array($this, 'add_admin_menu'),20);
        add_action('admin_init', array($this, 'register_settings'));
        new HorairesClass(); 
    } 
    public function add_admin_menu() { 
        //on ajoute une page dans le menu administrateur 
        add_menu_page('Horaires', 'Horaires', 'manage_options', 'helloworld', array($this, 'menu_html')); 
    } 
    
    public function menu_html() { 
        echo '<h1>'.get_admin_page_title().'</h1>'; 
        ?> 
        <form method="post" action="options.php"> 
        <?php settings_fields('helloworld_settings') ?>
            
            <div class="colonne contenu">
                <div>
                    <label>Premier jour de la semaine</label>
                    <div class="espace"></div>
                    <select name="semaine">
                        <option value="Lundi" selected>Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                        <option value="Dimanche">Dimanche</option>
                    </select>
                </div></br>
                <div>
                    <label>Afficher tout les jours</label>
                    <div class="espace"></div>
                    <input type="radio" name="verif_jour" value="Oui"/>
                </div>
            </div>

            <?php settings_fields('Horaires_settings') ?>
            <?php submit_button(); ?> 

        </form> 
        <?php
        echo '<h1>'.get_admin_page_title().'</h1>'; 
        echo '<p>Bienvenue sur la page d\'accueil du plugin</p>'; 
    }

    public function register_settings(){
        register_setting('Horaires_settings', 'verif_jour');
        global $wpdb;
    }
} 
new Horaires_Plugin();