<?php
require_once "./model/ruta.php";
class Controller{
    private $conexion;
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    //View Methods
    public function searchRoutes($search, $field){
        $routes = $this->model->getRoutesBy($search, $field);
        $view = '';
        if ($routes){
            require_once "./view/showSearch.php";
        return $view;
        }
        return "<h2 class='error'>No hay resultados para la búsqueda</h2>";
    }
    public function allRoutes(){
        $routes =  $this->model->getAllRoutes();
        $view='';
        if ($routes){
            require_once "./view/showAllRoutes.php";
        }
        else {
            $view = "<h2>No hay rutas creadas<h2>";
        }
        return $view;
        }
    public function commentRoute($route_id){
        $route = $this->model->getRoute($route_id);
        $comments = $this->model->getComments($route_id);
        $view = '';
        require_once "./view/showComments.php";
        return $view;
    }
   
    public function showEditRoute($route_id){
        $route = $this->model->getRoute($route_id);
        $view = '';
        require_once "./view/showEditRoute.php";
        return $view;

    }
    public function showNewRoute(){
        $view = '';
        require_once "./view/showNewRoute.php";
        return $view;
    }
    //Model Methods
    public function newRoute($title, $description, $unevenness, $distance, $difficulty, $notes ){
        $this->model->newRoute($title, $description, $unevenness, $distance, $difficulty, $notes);
    }
    public function editRoute($route_id, $title, $description, $unevenness, $distance, $difficulty, $notes){
        $this->model->editRoute($route_id, $title, $description, $unevenness, $distance, $difficulty, $notes);
    }
    public function deleteRoute($route_id){
        $this->model->deleteRoute($route_id);
    }
    public function newComment($route_id, $name, $text){
        $this->model->newComment($route_id, $name, $text);
    }
    
    
}