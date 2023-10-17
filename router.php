<?php
include_once "./App/controller/estaciones.controller.php";
include_once "./App/controller/ciudades.controller.php";
include_once "./App/controller/auth.controller.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listar'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
// parsea la accion 

$params = explode('/', $action); // genera un arreglo

switch ($params[0]) {
    case 'listar':
        $controller = new EstacionController();
        $controller->showEstaciones();
        break; 

    case 'insertar':
        $controller = new EstacionController();
        $controller->addEstacion();
         break;    

     case 'eliminar':
        $controller = new EstacionController();
        $controller->removeEstacion($params[1]);
            break;
    
    case 'ciudades':
        $controller = new CiudadController();
        $controller-> showCiudades();
        break;

    case 'infoCiudad':
        $controller = new CiudadController();
        $controller-> showInfoCiudades();
        break;
         
    default:
        header("Location: listar");
        break;
}

?>