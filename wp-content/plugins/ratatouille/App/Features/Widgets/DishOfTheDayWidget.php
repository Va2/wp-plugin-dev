<?php
namespace App\Features\Widgets;

// On créer une class qui étend une class prédéfinie de Wordpress 'WP_Widget'
// https://developer.wordpress.org/reference/classes/wp_widget/
class DishOfTheDayWidget extends \WP_Widget
{
    public static $slug = "dish-of-the-day";

    /**
     * Comme en JavaScript quand on créait une class on mettais un construct comme ca quand on faisait un extend de cette class on pouvait faire un super() qui permetait de rajouter ou de réduire le nombre de paramètre.
     * Pour cet exemple c'est pareil, on étend une class wordpress qui s'appel WP_Widget et on réutilise certains de ces paramètres comme : l'identifiant et le title à qui on attribue des valeurs.
     * Le construct est lancé lorsque l'on instancie la class on passe à la class parent le slug et le titre.
     */
    function __construct()
    {
        parent::__construct(
            self::$slug, // slug
            __("Plat du jour") // Titre
        );
    }

    // On enregistre notre widget dans le backoffice pour qu'il soit accessible et qu'on puisse s'en servir, on passe en paramètre la class pour qu'il charge un widget avec toutes les propriétés qu'on définira plus bas dans widget() & form() etc.
    public static function register()
    {
        register_widget(self::class);
    }

    // Méthode 'widget' de la class WP_Widget qui permet de rendre un visuel dans le frontend.
    public function widget($args, $instance)
    {
        // On include la vue dish-of-day-widget qui va être affichée dans le widget plat du jour dans le frontend.
        view('widgets/dish-of-day-widget');
    }
    
    // On fait appel à la methode 'form' qui vient de la class WP_Widget pour rendre un visuel dans le backoffice, allez dans votre backoffice -> Appearence -> Widgets et vous trouvez parmis tous les widgets, un widget qui s'appel 'Plat du jour' glissez le dans votre emplacement Footer, cliquez sur la petite fleche et voyez ce que vous trouverez comme texte.
    public function form($instance)
    {
        // On créer deux variables et pour chacune de ces variables on génère un name dont on va se servir dans notre formulaire (fichier dish-of-day-form.html.php ligne 3 et 6).
        $title_name = self::get_field_name('title');
        $text_name = self::get_field_name('text');

        // On compact() les deux variables pour pouvoir nous en servir dans le fichier en question ligne 3 et 6, il est interessent de faire un clique droit sur le formulaire et de regarder dans l'attribut name, le name qui a été généré par la function.
        view('widgets/dish-of-day-form', compact('title_name', 'text_name'));
    }

    // On utilise la methode update qui attend 2 paramètres qui vont être automatiquement rempli par la class WP_Widget, le premier paramètre va contenir les données entrées dans le formulaire, et le second paramètre les anciennes données qui avaient été enregistrer grâce à ce formulaire.
    public function update($new_instance, $old_instance){
        // On créer une variable de type Array
        $instance = [];
        
        // Avant de stocker les données dans le tableau on fait un peu de securité en utilisant la méthode strip_tags()
        // https://www.php.net/manual/fr/function.strip-tags.php
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '';

        // On return le tableau qui sera récupéré par notre méthode form ligne 37 automatiquement.
        return $instance;
    }
}