<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use PhpParser\Lexer\TokenEmulator\TokenEmulatorInterface;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceOf TokenBlacklistedException)
        {
            return response(['error' => 'Otentikasi token tidak dapat digunakan!'], Response::HTTP_BAD_REQUEST);
        } 
        
        else if($exception instanceOf TokenInvalidException)
        {
            return response(['error' => 'Username Atau Password Salah'], Response::HTTP_BAD_REQUEST);
        }

        else if($exception instanceOf TokenEmulatorInterface)
        {
            return response(['error' => 'waktu login telah habis, silahkan login kembali :)'], Response::HTTP_BAD_REQUEST);
        }
        
        else if($exception instanceOf JWTException)
        {
            return response(['error' => 'Token tidak diizinkan!'], Response::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $exception);
    }
}
