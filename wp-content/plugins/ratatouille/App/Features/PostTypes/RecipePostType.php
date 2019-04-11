<?php
namespace App\Features\PostTypes;

class RecipePostType
{
    // On créer une variable qu'on appel 'slug' on la rend public et static pour pouvoir s'en servir dans les functions de la class RecipePostType et en dehors.
    public static $slug = 'recipe';
    public static function register()
    {
        // Info sur la fonction https://developer.wordpress.org/reference/functions/register_post_type/
        register_post_type(
            // On remplace le slug qui était écrit en dur 'recipe' par la variable, on fait cela car on va fair appel à notre function register_post_type par son indentifiant à plusieurs endroits, si jamais on décide de changer l'identifiant qui est 'recipe' par 'carotte', alors il faudra le changer a de nombreux endroit si on laisse cela en dur. C'est pour cela qu'on à choisis de créer une variable, on change la valeur de la variable est tous les endroits ou son identifiant est utilisé seront mis à jours.
            self::$slug, 
            [
                'labels' => [
                    'name' => 'Recettes',
                    'singular_name' => 'Recette',
                    'add_new' => __('Ajouter'),
                    'add_new_item' => __('Ajouter une recette'),
                    'edit_item' => __('Modifier la recette'),
                    'new_item' => __('Nouvelle recette'),
                    'view_item' => __('Voir la recette'),
                    'view_items' => __('Voir les recettes'),
                    'search_items' => __('Rechercher des recettes'),
                    'not_found' => __('Pas de recette trouvées.'),
                    'not_found_in_trash' =>('Pas de recettes dans la corbeille.'),
                    'all_items' => __('Toutes les recettes'),
                    'archives' => __('Recettes archivées'),        
                    'filter_items_list' => __('Filtre de recette'),
                    'items_list_navigation' => __('Navigation de recette'),
                    'items_list' =>__('Liste recette'),
                    'item_published' => __('Recette publiée.'),
                    'item_published_privately' =>__('Recette publiée en privé.'),
                    'item_reverted_to_draft' =>__('La recette est retournée au brouillon.'),
                    'item_scheduled' => __('Recette planifiée.'),
                    'item_updated' =>__('Recette mise à jours.'),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'recette'
                ]
            ]
        );
    }
}