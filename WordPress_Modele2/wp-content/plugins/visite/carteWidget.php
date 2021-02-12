<?php 
class CarteWidget extends WP_Widget { 
    public function __construct() { 
        parent::__construct('visite', 'Carte de Visite', array('description' => 'Un plug-in d\'une carte de visite')); 
    } 
    public function widget($args, $instance) { 
        // formulaire afficher à l'écran pour l'utilisateur 
        // on appel les méthodes standard au cas où un autre plug-in les aurait surchargées 
        echo $args['before_widget']; 
        echo $args['before_title']; 
        echo apply_filters('widget_title', $instance['title']); 
        echo $args['after_title']; 
        // corps du widget 

        global $wpdb;
        $row=$wpdb->get_row("SELECT * FROM {$wpdb->prefix}donneesVisite ORDER BY `id` DESC LIMIT 1;");

        $nom = $row->Nom;
        $prenom = $row->Prenom;
        $adresse = $row->Adresse;
        $mail = $row->Email;
        $telephone = $row->Tel;
        $verifNomPrenom = get_option('verif_Nom_Prenom','nom-prenom');
        $verifAdresse = get_option('verif_adresse', 'Non');
        $verifPhone= get_option('verif_tel','Non');
        $verifMail = get_option('verif_mail','Non');

        ?> 
         <h1>Carte de visite</h1>
        <div id="carte">
            <!-- <div class="image"><img src="http://tout/WordPresse/WordPress2/wp-content/uploads/2021/02/ff2.jpg" alt=""></div> -->
            <div class="colonne">
                <div id="recto" class="colonne" >
                    <?php 
                    if($verifNomPrenom=="Nom-Prenom"){
                        echo '<div>'.$nom." ".$prenom.'</div> ';
                    }else{
                        echo '<div>'.$prenom." ".$nom.'</div> ';
                    }
                    ?>
                </div>
                <div id="verso" class="colonne invisible">
                <?php
                    if($verifAdresse=="Oui"){
                        echo '<div>'.$adresse.'</div> ';
                    }
                    if($verifMail=="Oui"){
                        echo '<div>'.$mail.'</div> ';
                    }
                    if($verifPhone=="Oui"){
                        echo '<div>'.$telephone.'</div> ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php 
            echo $args['after_widget']; 
    }

    public function form($instance) {  // formulaire de gestion des paramètres pour le module d'administration
        $title = isset($instance['title']) ? $instance['title'] : ''; 
        ?> 
        <p> 
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /> 
        </p> 
        <?php 
    }
}