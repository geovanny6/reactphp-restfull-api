<?php 
namespace App\Productos\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class DeleteProducto
{
    public function __invoke(ServerRequestInterface $request, string $id){
        return new Response(
            '200',
            ['Content-type'=>'application/json'],
            json_encode(['mensaje'=>"DELETE request to /producto/{$id}"])
        );
    }
}