<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas de Senderismo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once "./model/model.php";
    require_once "./model/connection.php";
    require_once "controller.php";
    $model = new Model();
    $controller = new Controller($model);
    ?>
    <header>
        <img src="http://olivo.mentor.mec.es/cursophp/iniciacion/php_ini_2014/unidad7/act1/senderismo.gif">
        <h1>Rutas Senderismo</h1>
    </header>
    <div id="opciones">
        <form name="form" action="./index.php" method="POST" class='buscar'>
            <label>Buscar por el campo
                <select name="campo" id="campo">
                    <option value="titulo">Título</option>
                    <option value="descripcion">Descripción</option>
                </select>
            </label>
            <div>
                <input type="text" name="busqueda" required>
                <input type="submit" value="¡Buscar!">
            </div>
        </form>
        <div id="forms">
            <form name="form2" method="POST">
                <input type="text" name="operacion" hidden value="nueva">
                <input type="submit" value="Nueva Ruta">
            </form>
            <form name="form3" method="POST">
                <input type="text" value="mostrar" name="operacion" hidden>
                <input type="submit" value="Listado Completo">
            </form>
        </div>
    </div>
    <hr>
    <div id="rutas">
        <?php
        if (isset($_POST['operacion'])) {
            if ($_POST['operacion'] == 'nueva') {
                if (isset($_POST['newTitle']) && isset($_POST['newTitle']) && isset($_POST['newDescription']) && isset($_POST['newUneveness']) && isset($_POST['newDistance'])) {
                    $controller->newRoute($_POST['newTitle'], $_POST['newDescription'], $_POST['newUneveness'], $_POST['newDistance'], $_POST['newDifficulty'], $_POST['newNotes']);
                    header('Location:index.php');
                } else {
                    echo $controller->showNewRoute();
                }
            } else {
                echo $controller->allRoutes();
            }
        } else if (isset($_POST['busqueda']) && isset($_POST['campo'])) {
            echo $controller->searchRoutes($_POST['busqueda'], $_POST['campo']);
        } else if (isset($_POST['comentar'])) {
            if (isset($_POST['nombre']) && isset($_POST['texto'])) {
                $controller->newComment($_POST['id_ruta'], $_POST['nombre'], $_POST['texto']);
            }
            echo $controller->commentRoute($_POST['comentar']);
        } else if (isset($_POST['editar'])) {
            if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {
                $controller->editRoute($_POST['id_ruta'], $_POST['titulo'], $_POST['descripcion'], $_POST['desnivel'], $_POST['distancia'], $_POST['dificultad'], $_POST['notas']);
            }
            echo $controller->showEditRoute($_POST['editar']);
        } else if (isset($_POST['borrar'])) {
            $controller->deleteRoute($_POST['borrar']);
            echo $controller->allRoutes();
        } else {
            echo $controller->allRoutes();
        }
        ?>
    </div>
</body>

</html>