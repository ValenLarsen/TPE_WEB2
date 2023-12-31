<?php

require_once "config.php";
class EstacionModel{
     //abre la conexion con la base de datos
     private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);    }


    /**
     * Obtiene y devuelve de la base de datos todas las estaciones.
     */
    function getEstaciones() {
        $query = $this->db->prepare('SELECT * FROM estaciones');
        $query->execute();

        // $estaciones es un arreglo de tareas
        $estaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $estaciones;

    }
    
    function addEstacion($nombre_estacion) {
        $query = $this->db->prepare('INSERT INTO estaciones (nombre_estacion) VALUES(?)');
        $query->execute([$nombre_estacion]);

        return $this->db->lastInsertId();
    }


    function deleteEstacion($id_estacion) {
        $query = $this->db->prepare('DELETE  FROM estaciones WHERE  id_estacion = ?');
        $query->execute([$id_estacion]);
    }


    function updateEstacion($id_estacion) {    
        $query = $this->db->prepare('UPDATE estacion SET finalizo_estacion = 1 WHERE id = ?');
        $query->execute([$id_estacion]);
    }
    

  


}