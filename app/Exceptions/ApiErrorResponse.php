<?php

namespace App\Exceptions;

trait ApiErrorResponse
{
    protected $statusCode = 200;

    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function setStatusCode($newCode)
    {
        $this->statusCode = $newCode;

        return $this;
    }

    public function respondWithError($message, $errorType, $errorCode, $param = '')
    {
        if ($this->statusCode === 200) {
            trigger_error("Are you reporting error on a success request?", E_USER_WARNING);
        }

        return $this->respondWithArray([
            'error' => [
                'type'      => $errorType,
                'code'      => $errorCode,
                'http_code' => $this->statusCode,
                'message'   => $message,
                'param'     => $param,
            ],
        ]);
    }

    protected function respondWithArray(array $data, array $headers = [])
    {
        return response()->json($data, $this->statusCode, $headers);
    }

    public function errorWrongArgs($message = 'Argumentos invalidos', $errorCode)
    {
        return $this->setStatusCode(400)
            ->respondWithError($message, 'API-ARGUMENTOS-INVALIDOS', $errorCode);
    }

    public function errorUnauthenticated($message = 'Unauthenticated', $errorCode = 'sin_autenticacion')
    {
        return $this->setStatusCode(401)
            ->respondWithError($message, 'API-ERROR-AUTENTICACION', $errorCode);
    }

    public function errorUnauthorized($message = 'Unauthorized', $errorCode = 'sin_autorizacion')
    {
        return $this->setStatusCode(403)
            ->respondWithError($message, 'API-ERROR-AUTORIZACION', $errorCode);
    }

    public function errorNotFound($message = 'El recurso solicitado en la llamada no existe', $errorCode = 'no_encontrado')
    {
        return $this->setStatusCode(404)
            ->respondWithError($message, 'API-RECURSO-NO-ENCONTRADO', $errorCode);
    }

    public function errorValidation($message = 'Error de Validación de Datos', $errorCode, $param)
    {
        return $this->setStatusCode(422)
            ->respondWithError($message, 'API-ERROR-VALIDACION', $errorCode, $param);
    }

    public function errorInDomain($message = 'Error en Reglas de Negocio')
    {
        return $this->setStatusCode(400)
            ->respondWithError($message, 'API-DOMAIN-ERROR');
    }

    public function errorInternalError($message = 'Internal Error', $errorCode)
    {
        return $this->setStatusCode(500)
            ->respondWithError($message, 'API-ERROR-INTERNO', $errorCode);
    }
}
