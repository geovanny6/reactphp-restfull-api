<?php   
namespace App\Ordenes\Controller;

use Psr\Http\Message\ServerRequestInterface;
use App\Core\JsonResponse;

final class CreateOrden
{
    public function __invoke(ServerRequestInterface $request)
    {
        // $orden = [
        //     'productoId'=>$request->getParsedBody()[]
        // ];
        foreach($request->getParsedBody() as $key => $val ){
            $orden[$key] = $val;
        }
        return JsonResponse::ok(['message'=>'POST respuesta a /ordenes/',"orden",$orden]);
    }
}