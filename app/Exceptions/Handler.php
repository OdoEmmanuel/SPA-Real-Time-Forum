<?php

namespace App\Exceptions;

use Throwable;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render( $request,  Throwable $exception)
    {
        if($exception instanceof TokenBlacklistedException){
            return response(['error' => 'JWT Token can not been used twice'], Response::HTTP_BAD_REQUEST);
        }elseif($exception instanceof TokenInvalidException){
            return response(['error' => 'JWT Token is Invalid'], Response::HTTP_BAD_REQUEST);
        }elseif($exception instanceof TokenExpiredException){
            return response(['error' => 'JWT Token is Expired'], Response::HTTP_BAD_REQUEST);
        }elseif($exception instanceof JWTException){
            return response(['error' => 'JWT Token not provided'], Response::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $exception);
    }
}
