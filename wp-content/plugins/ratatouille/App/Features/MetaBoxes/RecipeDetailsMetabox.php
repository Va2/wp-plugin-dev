<?php
namespace App\Features\MetaBoxes;

use App\Features\PostTypes\RecipePostType;

class RecipeDetailsMetabox
{
    public static $slug = 'recipe_details_metabox';

    /**
     * Ajout d'une méta box au type de contenu qui sont passer dans le tableau $screens
     * https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
     *
     * @return void
     */
    public static function add_meta_box()
    {
        $screen = [RecipePostType::$slug];
        add_meta_box(
            self::$slug,                // Unique ID
            __("Détails de la recette"),// Box title
            [self::class, 'render'],    // Content callback, must be of type callable
            $screen                     // Post type
        );
    }

    /**
     * Fonction pour rendre le code html dans la metabox
     *
     * @return void
     */
    public static function render()
    {
        // Récupération de toutes les metadata du post
        // https://developer.wordpress.org/reference/functions/get_post_meta/
        $data = get_post_meta(get_the_ID());
        $time = extract_data_attr('time_preparation', $data);
        
        // Création d'une variable contenant la valeur qu'on a été chercher dans la BDD grâce à get_post_meta(get_the_ID()) et qu'on assaini via le helper extract_data_attr()
        $nbr_persons = extract_data_attr('nbr_persons', $data);

        // On rajoute dans compact() la seconde variable pour l'envoyer dans la view recipe-detail
        view('metaboxes/recipe-detail', compact('time', 'nbr_persons'));
    }

    /**
     * Sauvegarde des données de la metabox
     *
     * @param [type] $post_id reçu par le do_action
     * @return void
     */
    // $post_id est rempli par l'id du post contenu dans l'url de la page
    public static function save($post_id)
    {
        if (count($_POST) != 0) {
            // Je créer un tableau dans lequel je stocke les données récupérées par ma requête aux quelles j'assigne des clefs
            $data = [
                // Clefs            => name du champ pour récupérer la valeur
                'time_preparation'  => sanitize_text_field($_POST['rat_time_preparation']),
                'nbr_persons'       => sanitize_text_field($_POST['rat_nbr_persons']),
            ];

            // J'utilise le helper update_post_metas que j'ai créer dans le fichier helpers.php ligne 36,je passe deux variables, $post_id qui contient l'id du post, et $data qui contient un tableau de données récupéré
        }
    }
}