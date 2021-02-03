<?php 
namespace App\Ordenes\Controller;

use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;
// use React\Http\Message\Response;


final class DeleteOrden
{
    public function __invoke(ServerRequestInterface $request, string $id){
        return JsonResponse::ok(['mensaje'=>"DELETE request to /ordenes/{$id}"]) ;
    }
}