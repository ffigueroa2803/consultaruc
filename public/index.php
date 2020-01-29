<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';
require '../src/curl.php';
require '../src/sunat.php';


$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

//crear las rutas para los clentes
require '../src/routes/clientes.php';

//crear la ruta de la consulta ruc
require '../src/routes/ruc.php';

//crear la ruta de la consulta dni
//require '../src/routes/dni.php';


$corsOptions = array(
    "origin" => "*",
    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
  );
  
  $cors = new \CorsSlim\CorsSlim($corsOptions);
  
$app->add($cors);
$app->run();