<?php
$difficulty = ['Baja', 'Media', 'Alta'];
$comments_section = '';
if ($comments){
    
            foreach ($comments as $comment){
                $comments_section.="<tr><td>".$comment['nombre']."</td><td>".$comment['fecha']."</td><td>".$comment['texto']."</td></tr>";
            }
        }
        $view.= "<h2>COMENTAR RUTA</h2>
        <table id='tabla_ruta'>
            <tr> 
                <th>Titulo<th>
                <td>".$route['titulo']."<td>
            </tr>
            <tr> 
                <th>Descripcion<th>
                <td>".$route['descripcion']."<td>
            </tr>
            <tr> 
                <th>Desnivel(m)<th>
                <td>".$route['desnivel']."<td>
            </tr>
            <tr> 
                <th>Distancia(km)<th>
                <td>".$route['distancia']."<td>
            </tr>
            <tr> 
                <th>Dificultad(km)<th>
                <td>".$difficulty[$route['dificultad']-1]."</td>
            </tr>
            <tr> 
                <th>Notas<th>
                <td>".$route['notas']."<td>
            </tr>
        </table>
        <table id='tabla_editar_ruta'>
            <thead>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Comentario</th>
            </thead>
            <tr>
                <form method='POST'>
                    <td>
                        <input type='text' name='nombre' required>
                    </td>
                    <td>".
                        date('d-m-Y')
                    ."</td>
                    <td>
                        <input type='text' name='texto' size='100' required>
                        <input type='text' name='comentar' value='".$route_id."' hidden>
                        <input type='text' name='id_ruta' value='".$route_id."' hidden>
                        <input type='submit' value='Añadir'>
                    </td>
                </form>
            </tr>".$comments_section.
        "</table>";