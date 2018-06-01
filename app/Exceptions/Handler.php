<?php

namespace App\Exceptions;

use App\Exceptions\ApiErrorResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiErrorResponse;
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        // if (app()->environment() === 'testing') {
        //     throw $exception;
        // }
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
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            flash('El usuario no tiene los roles correctos')->error();
            return back();
        }
        if ($exception instanceof ModelNotFoundException) {
            $exception = new NotFoundHttpException($exception->getMessage(), $exception);
            return response()->view('errors.message', ['message' => $exception->getMessage()], 404);
        }
        return parent::render($request, $exception);
    }

    protected function failedValidation($request, ValidationException $exception)
    {
        $param   = $exception->validator->errors()->keys()[0];
        $message = $exception->validator->errors()->first($param);

        if ($request->expectsJson()) {
            return $this->errorValidation($message, 'parametro_invalido', $param);
        }

        return $this->convertValidationExceptionToResponse($exception, $request);
    }
}
