<table class="form-table">
    <tr>
        <th><?php _e("Temps de préparation"); ?></th>
        <td>
            <select name="rat_time_preparation" id="rat_time_preparation">
                <!-- On fait en sorte que l'option soit sélectionnée en fonction de la valeur récupérée dans la db. -->
                <option value="">--</option>
                <option <?= $time == '10-15' ? 'selected' : '' ?> value="10-15">10 - 15 min</option>
                <option <?= $time == '15-30' ? 'selected' : '' ?> value="15-30">15 - 30 min</option>
                <option <?= $time == '30-45' ? 'selected' : '' ?> value="30-45">30 - 45 min</option>
            </select>
        </td>
    </tr>
    <tr>
        <th><?php _e("Nombre de personne"); ?></th>
        <td>
            <!-- Création du visuel en html (un input) dans lequel on met en valeur la variable qui à été envoyée par le compact dans RecipeDetailsMetabox.php ligne 43 -->
            <input type="number" name="rat_nbr_persons" id="rat_nbr_persons" value="<?= $nbr_persons ?>" >
        </td>
    </tr>
</table>