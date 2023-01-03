<?php
$difficulty = ['Baja', 'Media', 'Alta'];
$view .="
            <table>
                <thead>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Desnivel (m)</th>
                    <th>Distancia (km)</th>
                    <th>Dificultad</th>
                    <th>Operaciones</th>
                </thead>";
        foreach ($routes as $route){
            $view .= "
            <tr>
                <td>".$route['titulo']."</td>
                <td>".$route['descripcion']."</td>
                <td>".$route['desnivel']."</td>
                <td>".$route['distancia']."</td>
                <td>".$difficulty[$route['dificultad']-1]."</td>
                <td class='actions'>
                        <form method='POST'>
                            <input type='text' name='comentar' value=".$route['id']." hidden>
                            <input type='submit' value='Comentar'>
                        </form>
                        <form method='POST'>
                            <input type='text' name='editar' value=".$route['id']." hidden>
                            <input type='submit' value='Editar'>
                        </form>
                        <form method='POST'>
                            <input type='text' name='borrar' value=".$route['id']." hidden>
                            <input type='submit' value='Borrar'>
                        </form>
                </td>
            </tr>";
        }
        $view .= "</table><div><h3>El nº total de rutas es ".count($routes)."</h3><h3>La ruta más larga tiene ".
        $this->model->getMaxDistance()."km</h3></div>";