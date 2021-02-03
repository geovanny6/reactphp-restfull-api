<?php

namespace App\Ordenes\Controller;
use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;
// use React\Http\Message\Response;

final class GetAllOrdenes
{
    public function __invoke(ServerRequestInterface $request)
    {
        return JsonResponse::ok(['message'=>'GET respuesta a /oredenes'])        ;
        
    }
}