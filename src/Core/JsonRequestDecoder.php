<?php 
namespace App\Core;

// use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ServerRequestInterface;
final class JsonRequestDecoder
{
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        switch ($request->getHeaderLine('Content-type')) {
            case  'application/json':
                # code...
                $request= $request->withParsedBody(
                    json_decode($request->getBody()->getContents(),true)
                );
                break;
            
        }
        return $next($request);
    }
}