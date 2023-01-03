<?php
class Ruta{
    private $titulo;
    private $descripcion;
    private $desnivel;
    private $distancia;
    private $dificultad;

public function __construct($titulo, $descripcion, $desnivel, $distancia, $dificultad)
{
   $this->titulo = $titulo;
   $this->descripcion = $descripcion;
   $this->desnivel = $desnivel;
   $this->distancia = $distancia;
   $this->dificultad = $dificultad; 
}
}
?>