<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Obtener datos de cliente
$app->get('/api/ruc/{ruc}', function(Request $request, Response $response){
    
        $id = $request->getAttribute('ruc');
    
        try{
            
            //$consultaDel = "DELETE FROM sunat";

            // Instanciar la base de datos
            //$db = new db();
        
            // Conexión
            //$db = $db->conectar();
            //$stmt = $db->prepare($consultaDel);
            //$stmt->execute();

            $cliente = new \Sunat\Sunat();
            $valor = $cliente->search($id,true);
            echo $valor;

            
        } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }
});