<?php
include "config.php";
include "function.php";
if (!isset($_SESSION)) session_start();
spl_autoload_register('loadClass');

$controller = isset($_GET['controller'])?$_GET['controller']:'HomeController';
//echo $controller;

$c = new $controller();

// require './Controllers/BaseController.php';
// $controllerName = ucfirst(strtolower(($_REQUEST['controller']) ?? 'Home') . 'Controller');

// $actionName = $_REQUEST['action'] ?? 'index';

// require "./Controllers/".$controllerName.".php";

// $controllerObject = new $controllerName;

//  $controllerObject->$actionName();
?>