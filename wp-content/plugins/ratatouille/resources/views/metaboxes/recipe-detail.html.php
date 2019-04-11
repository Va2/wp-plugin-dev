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
</table>