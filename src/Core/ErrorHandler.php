<?php 
namespace App\Core;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use App\Core\JsonResponse;
final class ErrorHandler{
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        try{
            return $next($request);
        }
        catch(\Throwable $e)
        {
         return JsonResponse::internalServerError($e->getMessage(),$e->getCode());
        }

    }
}