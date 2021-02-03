<?php 
namespace App\Ordenes\Controller;

use Psr\Http\Message\ServerRequestInterface;
// use React\Http\Message\Response;
use App\Core\JsonResponse;

final  class UpdateOrden
{
    public function __invoke(ServerRequestInterface $request, string $id)
    {
        return JsonResponse::ok(['mensaje'=>"PUT request to /ordenes/{$id}"]) ;

    }

}
