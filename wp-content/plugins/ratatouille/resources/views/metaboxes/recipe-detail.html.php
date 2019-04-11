<table class="form-table">
    <tr>
        <th><?php _e("Temps de préparation"); ?></th>
        <td>
            <select name="rat_time_preparation" id="rat_time_preparation">
                <!-- Maintenant que le tableau a été traité et renvoyé dans cette vue on peut se servir de la clef devant laquelle on rajoute un "$" pour récupérer la valeur qui lui à été attribuée. -->
                <option value=""><?php echo $preparation_time ?></option>
                <option value="10-15">10 - 15 min</option>
                <option value="15-30">15 - 30 min</option>
                <option value="30-45">30 - 45 min</option>
            </select>
        </td>
    </tr>
</table>