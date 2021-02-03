<?php

namespace App\Productos\Controller;
use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;

final class GetAllProductos
{
    public function __invoke(ServerRequestInterface $request)
    {
        return  JsonResponse::ok(['message'=>'GET respuesta a productos']);
        
    }
    
}