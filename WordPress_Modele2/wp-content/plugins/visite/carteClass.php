<?php //on inclu la definition du widget 
include_once plugin_dir_path( __FILE__ ).'/carteWidget.php'; 
class CarteClass{ 
    public function __construct(){ 
        // on déclare le widget 
        add_action('wp_enqueue_scripts',array($this,'persoCSS'),15);
        add_action('wp_footer',array($this,'persoJS'),15);
        add_action('widgets_init', function(){
            register_widget('CarteWidget');
        }); 
    }   

    function persoCSS() { 
        wp_enqueue_style('Visite', plugins_url('visite/style.css')); 
    }

    function persoJS(){
        wp_enqueue_script('Visite', plugins_url('visite/script.js'));
    }

    public static function install() {
        //méthode déclenchée à l'activation du plug-in 
        global $wpdb; 
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}donneesVisite(
            id INT AUTO_INCREMENT PRIMARY KEY,  
            Nom VARCHAR(50) NOT NULL, 
            Prenom VARCHAR(75) NOT NULL, 
            Adresse VARCHAR(120) NOT NULL, 
            Email VARCHAR(150) NOT NULL, 
            Tel INT NOT NULL);
        "); 
    }

    public static function uninstall() {
        //méthode déclenchée à la suppression du module 
        global $wpdb; 
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}donneesVisite;"); 
    }
}