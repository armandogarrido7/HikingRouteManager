<?php
    $view.= "<h2>MODIFICAR RUTA</h2>
        <table>
            <form method='POST'>
                <tr> 
                    <th>Titulo<th>
                    <td><input type='text' name='titulo' value='".$route['titulo']."' size='50'><td>
                    <input type='text' name='id_ruta' value='".$route_id."' hidden>
                    <input type='text' name='editar' value='".$route_id."' hidden>
                </tr>
                <tr> 
                    <th>Descripcion<th>
                    <td><input type='text' name='descripcion' value='".$route['descripcion']."' size='100'><td>
                </tr>
                <tr> 
                    <th>Desnivel(m)<th>
                    <td><input type='text' name='desnivel' value='".$route['desnivel']."' size='30'><td>
                </tr>
                <tr> 
                    <th>Distancia(km)<th>
                    <td><input type='text' name='distancia' value='".$route['distancia']."' size='30'><td>
                </tr>
                <tr> 
                    <th>Dificultad(km)<th>
                    <td>
                        <select name='dificultad' >
                            <option value=1 ".($route['dificultad'] == 1? "selected":"").">Baja</option>
                            <option value=2 ".($route['dificultad'] == 2? "selected":"").">Media</option>
                            <option value=3 ".($route['dificultad'] == 3? "selected":"").">Alta</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <th>Notas<th>
                    <td><textarea name='notas' rows='15' cols='100'>".$route['notas']."</textarea>
                </tr>
                <tfoot>
                    <td colspan='6'><input type='submit' value='Modificar Ruta'></td>
                </tfoot>
            </form>
        </table>";
