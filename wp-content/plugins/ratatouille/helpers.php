<?php
/**
 * fonction pour rendre une view
 *
 * @param string $path chemin du fichier à partir du dossier views sans l'extention '.html.php'
 * @return void
 */
function view($path)
{
    // Cette function (= helper), me permet de faire un include plus rapidement. Je récupère juste le chemin du fichier à partir du dossier views sans l'extention dans le fichier RecipeDetailsMetabox.php (ligne 36) que j'envoi en paramètre. Ce chemin est envoyé dans la variable $path, puis je complète le chemin avec ma variable global et l'extention.
    include(RAT_VIEW_DIR . $path . '.html.php');
}