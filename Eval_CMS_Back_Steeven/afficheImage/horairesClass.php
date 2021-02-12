<?php //on inclu la definition du widget 
include_once plugin_dir_path( __FILE__ ).'/horairesWidget.php'; 
class HorairesClass{ 
    public function __construct(){ 
        // on déclare le widget 
        add_action('wp_enqueue_scripts',array($this,'persoCSS'),15);
        add_action('widgets_init', function(){
            register_widget('horairesWidget');
        }); 
    }   
    
    function persoCSS() { 
        wp_enqueue_style('Horaire', plugins_url('afficheImage/style.css')); 
    }


    public static function install() {
        //méthode déclenchée à l'activation du plug-in 
        global $wpdb; 
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}horaires(
            id INT AUTO_INCREMENT PRIMARY KEY,  
            Jour VARCHAR(15) NOT NULL, 
            HorairesMatinDebut VARCHAR(20) NOT NULL, 
            HorairesMatinFin VARCHAR(20) NOT NULL,
            HorairesApresMidiDebut VARCHAR(20) NOT NULL,
            HorairesApresMidiFin VARCHAR(20) NOT NULL;
        "); 
    }

    public static function uninstall() {
        //méthode déclenchée à la suppression du module 
        global $wpdb; 
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}horaires;"); 
    }
}