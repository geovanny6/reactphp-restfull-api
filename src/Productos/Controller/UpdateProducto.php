<?php 
namespace App\Productos\Controller;

use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;
// use React\Http\Message\Response;

final  class UpdateProducto
{
    public function __invoke(ServerRequestInterface $request, string $id)
    {
        return  JsonResponse::ok(['mensaje'=>"PUT request to /productos/{$id}"]);

    }

}
