<?php

use Exceptions\NotFoundException;

require('vendor/autoload.php');




$router = new AltoRouter();
$router->setBasePath('/final');
$router->map('GET|POST', '/', function () {
    $controller = new App\Controllers\MainController();
    $controller->index();
}, 'home');


$router->map(
    'GET',
    '/search',
    function () {
        $controller = new App\Controllers\SearchController();
        $controller->index();
    },
    'search'
);


$router->map(
    'GET',
    '/panier',
    function () {
        $controller = new App\Controllers\PanierController();
        $controller->index();
    },
    'panier'
);

$router->map(
    'POST',
    '/panier',
    function () {
        $controller = new App\Controllers\PanierController();
        $controller->upValue();
        $controller->downValue();
    },
    'panier post'
);




$match = $router->match();
if (is_array($match)) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    }
}


try {
    $match;
} catch (NotFoundException $e) {
    return $e->error404();
}
