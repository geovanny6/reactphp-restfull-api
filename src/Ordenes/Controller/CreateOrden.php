<?php   
namespace App\Ordenes\Controller;

use Psr\Http\Message\ServerRequestInterface;
// use React\Http\Message\Response;
use App\Core\JsonResponse;

final class CreateOrden
{
    public function __invoke(ServerRequestInterface $request)
    {
        return JsonResponse::ok(['message'=>'POST respuesta a /ordenes/']);
    }
}