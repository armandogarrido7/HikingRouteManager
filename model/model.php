<?php
require_once "connection.php";
require_once "config.php";
class Model{
private $connection;
public function __construct(){
    $this->connection = new Connection(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB);
}
public function getRoute($route_id){
    return $this->connection->makePreparedQuery("SELECT * FROM rutas WHERE id = ?",[$route_id])[0];
}
public function getRoutesBy($search, $field){
    $params = ["%$search%"];
    return $this->connection->makePreparedQuery("SELECT * FROM rutas WHERE ".$field." LIKE ?", $params);
}
public function getAllRoutes(){
    return $this->connection->makePreparedQuery('SELECT * FROM rutas');
}
public function getMaxDistance(){
    return $this->connection->makePreparedQuery("SELECT MAX(distancia) FROM rutas")[0]['MAX(distancia)'];
}
public function getComments($route_id){
    return $this->connection->makePreparedQuery("SELECT * FROM rutas_comentarios WHERE id_ruta = ?", [$route_id]);
}
public function newComment($route_id, $name, $text){
    $params = [$route_id, $name, $text, date('Y-m-d')];
    $this->connection->makePreparedQuery("INSERT INTO rutas_comentarios (id_ruta, nombre, texto, fecha) VALUES (?, ?, ?, ?)", $params);
}
public function newRoute($title, $description, $unevenness, $distance, $difficulty, $notes){
    $params = [$title, $description, $unevenness, $distance, $difficulty, $notes];
    $this->connection->makePreparedQuery("INSERT INTO rutas (titulo,descripcion, desnivel, distancia, dificultad, notas) values (?, ?, ?, ?, ?, ?)", $params);
}
    
public function editRoute($route_id, $title, $description, $unevenness, $distance, $difficulty, $notes){
    $params = [$title, $description, $unevenness, $distance, $difficulty, $notes, $route_id];
    $this->connection->makePreparedQuery("UPDATE rutas SET titulo = ?, descripcion = ?, desnivel = ?, distancia= ? , dificultad = ?, notas = ? WHERE id = ?", $params);

}
public function deleteRoute($route_id){
    $this->connection->makePreparedQuery("DELETE FROM rutas WHERE id=?", [$route_id]);
    $this->connection->makePreparedQuery("DELETE FROM rutas_comentarios WHERE id=?", [$route_id]);
}
}
?>