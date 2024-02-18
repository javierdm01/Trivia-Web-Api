<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\Trivia_WebApi\controllers\CategoriesController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/view/CategoriesView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/services/Categories.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/services/CategoriesService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'\Trivia_WebApi\controllers\QuestionsController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/view/QuestionsView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/services/Questions.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/services/QuestionsService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/services/libraries/functions.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/view/templates/mensajeCheck.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Trivia_WebApi/view/templates/mensajeError.php';

define('ACCION_DEFECTO', 'showViewQuestions');
define('CONTROLADOR_DEFECTO', 'Categories');



function lanzarAccion($controllerObj){
    
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
        
    }
}

function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}

function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        die ("controlador no válido");
    }
}

if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
