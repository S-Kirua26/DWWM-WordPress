<?php 
class HorairesWidget extends WP_Widget { 
    public function __construct() { 
        parent::__construct('horaire', 'horaires', array('description' => 'Un plug-in des horaires d\'un magasin')); 
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
        $row=$wpdb->get_row("SELECT * FROM {$wpdb->prefix}horaires ORDER BY `id` DESC LIMIT 1;");

        $jour = $row->Jour;
        $horMatinDebut = $row->HorairesMatinDebut;
        $horMatinFin = $row->HorairesMatinFin;
        $horApresMidiDebut = $row->HorairesApresMidiDebut;
        $horApresMidiFin = $row->HorairesApresMidiFin;
        ?> 

    <div id="horaire">
        <div class="colonne">
          <div>
            <?php 
                echo '<div>'.$jour.'</div> ';
                echo '<div>'.$horMatinDebut." ".$horMatinFin." ".$horApresMidiDebut." ".$horApresMidiFin.'</div> ';
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