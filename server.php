<?php
require 'vendor/autoload.php';

use React\EventLoop\Factory;
use React\Http\Server;
use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
// use FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\Dispatcher;
use App\Core\Router;
use \App\Core\ErrorHandler;
use \App\Core\JsonRequestDecoder;
use App\Productos\Controller\GetAllProductos;
use App\Productos\Controller\CreateProducto;
use App\Productos\Controller\GetProductoById;
use App\Productos\Controller\UpdateProducto;
use App\Productos\Controller\DeleteProducto;

use App\Ordenes\Controller\GetAllOrdenes;
use App\Ordenes\Controller\CreateOrden;
use App\Ordenes\Controller\GetOrdenById;
use App\Ordenes\Controller\UpdateOrden;
use App\Ordenes\Controller\DeleteOrden;
$loop = Factory::create();

$routes = new RouteCollector(new  Std(),new GroupCountBased());
// rutas para productos
$routes->get('/productos',new GetAllProductos());
$routes->post('/productos',new CreateProducto());
$routes->get('/productos/{id:\d+}',new GetProductoById());
$routes->put('/productos/{id:\d+}',new UpdateProducto());
$routes->delete('/productos/{id:\d+}',new DeleteProducto());

// rutas para ordenes
$routes->get('/ordenes',new GetAllOrdenes());
$routes->post('/ordenes',new CreateOrden());
$routes->get('/ordenes/{id:\d+}',new GetOrdenById());
$routes->put('/ordenes/{id:\d+}',new UpdateOrden());
$routes->delete('/ordenes/{id:\d+}',new DeleteOrden());
 

$server = new Server($loop,new ErrorHandler(),new JsonRequestDecoder(),new Router($routes));
// $server = new Server($loop,[new ErrorHandler(),new Router($routes)]);
$socket = new React\Socket\Server('127.0.0.1:1313',$loop);
// $socket = new React\Socket\Server('127.0.0.1:1313',$loop);
$server->listen( $socket);

/**
 * manipular errores
 */
$server->on('error',function(Throwable $error){
echo "Error:".$error->getMessage().PHP_EOL;
});

echo 'escuchando: ' . str_replace('tcp','http',$socket->getAddress()).PHP_EOL;
$loop->run();