<?php

// define routes

$routes = array(
    array(
        "pattern" => "",
        "controller" => "",
        "action" => ""
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
