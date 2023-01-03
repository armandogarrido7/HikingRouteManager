<?php
$view .='
<h2>ALTA DE NUEVA RUTA</h2>
<form action="" method="POST">
<table>
    <tr>
        <th>Título</th>
        <td><input type="text" name="newTitle" required></td>
        <input type="text" name="operacion" value="nueva" hidden>
    </tr>
    <tr>
        <th>Descripción</th>
        <td><input type="text" name="newDescription" required></td>
    </tr>
    <tr>
        <th>Desnivel(m)</th>
        <td><input type="number" name="newUneveness" required></td>
    </tr>
    <tr>
        <th>Distancia(Km)</th>
        <td><input type="number" name="newDistance" required></td>
    </tr>
    <tr>
        <th>Dificultad</th>
        <td>
            <select name="newDifficulty" id="">
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Notas</th>
        <td><textarea name="newNotes" cols="30" rows="10" required></textarea></td>
    </tr>
</table>
<input type="submit" value="Alta ruta" id="nuevaRutaBtn">
</form>'

?>