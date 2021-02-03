<?php 

namespace App\Productos\Controller;
use Psr\Http\Message\ServerRequestInterface;
 use App\Core\JsonResponse;

final class GetProductoById
{
    public function __invoke( ServerRequestInterface $request, string $id)
    {
        return JsonResponse(['mensaje'=>"GET request to /products/{$id}"]);
    }
}