<?php 
namespace App\Core;

use React\Http\Message\Response;

final class JsonResponse  
{
    public static function response(int $statusCode, $data=null): Response
    {
        $body = $data ? json_encode($data):null;
        return new Response(
            $statusCode,
            ['Content-Type'=>'application/json'],
            $body
        );
    }
    public static function ok($data): Response
    {
        return self::response(200,$data);
    }
    public static function internalServerError(string $reason,int $code):Response
    {
        return self::response(500,['message'=>$reason,'code'=>$code]);
    }
}