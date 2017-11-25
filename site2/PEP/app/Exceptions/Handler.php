<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }
    public function render($request, Exception $exception)
    {
        $class = get_class($exception); 
        switch($class) {
            case 'Illuminate\Auth\AuthenticationException':
                 $guard = array_get($exception->guards(), 0);
            switch ($guard) {
                case 'admin':
                    $login = 'admin.login';
                    break;
                default:
                    $login = 'login';
                    break;
            }
            return redirect()->route($login);
        }
        return parent::render($request, $exception);
    }
}
