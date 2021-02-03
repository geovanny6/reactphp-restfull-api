<?php 
namespace App\Core;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\Response;
use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use LogicException;
final class Router  
{

    private $dispatcher;
    public function __construct(RouteCollector $routes){
        $this->dispatcher = new Dispatcher\GroupCountBased($routes->getData());
    }

    public function __invoke(ServerRequestInterface $request)
    {    
        // throw new \Exception("Error Processing Request", 1);
        
        $routeInfo = $this->dispatcher->dispatch(
            $request->getMethod(),$request->getUri()->getPath()
        );

        //verificar las constantes para resultado de nuestras rutas en el caso, que existe, no este permitido o no exista
        switch($routeInfo[0])
        {
            case Dispatcher::NOT_FOUND:
                return new Response('404',['Content-Type'=>'text/plain'],'No encontrado');
            
            case Dispatcher::METHOD_NOT_ALLOWED:
                return new Response('405',['Content-Type'=>'text/plain'],'No encontrado');
                
            case Dispatcher::FOUND:
                $params = array_values($routeInfo[2]);
                return $routeInfo[1]($request, ...$params);
        }
        throw new LogicException('Algo esta man el el ruteo');
    }
}