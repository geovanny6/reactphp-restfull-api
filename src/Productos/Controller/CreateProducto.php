<?php   
namespace App\Productos\Controller;

use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;

final class CreateProducto
{
    public function __invoke(ServerRequestInterface $request)
    {
        return JsonResponse::ok(['message'=>'POST respuesta a productos']);
    }
}