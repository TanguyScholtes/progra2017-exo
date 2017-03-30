<?php
session_start();

require( 'configs/routes.php' );
$default_route = $routes[ 'default' ];
$route_parts = explode( '/', $default_route );
$method = $_SERVER[ 'REQUEST_METHOD' ];
$ressource = $_REQUEST[ 'ressource' ] ?? $route_parts[ 1 ];
$action = $_REQUEST[ 'action' ] ?? $route_parts[ 2 ];

//var_dump( 'email : ' . $_SESSION['email'] );
//var_dump('user : ' . $_SESSION['user']);
//var_dump($method . '/' . $ressource . '/' . $action);

if ( !in_array( $method . '/' . $ressource . '/' . $action, $routes ) ) {
    die( 'Unauthorized action ' . $action . ' on ressource ' . $ressource . ' with method ' . $method . '.' );
}

$controllerFile = $ressource . 'Controller.php';
require( 'controllers/' . $controllerFile );
$data = call_user_func( $action );
