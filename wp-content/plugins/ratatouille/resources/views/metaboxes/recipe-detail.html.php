<table class="form-table">
    <tr>
        <th><?php _e("Temps de préparation"); ?></th>
        <td>
            <select name="rat_time_preparation" id="rat_time_preparation">
                 <!-- On passe notre clef de $preparation_time à $time car on utilise une function compact dans RecipeDetailsMetabox qui elle génère une clef du même nom que la variable passée. -->
                <option value="<?= $time ?>"><?= $time ?></option>
                <option value="10-15">10 - 15 min</option>
                <option value="15-30">15 - 30 min</option>
                <option value="30-45">30 - 45 min</option>
            </select>
        </td>
    </tr>
</table>