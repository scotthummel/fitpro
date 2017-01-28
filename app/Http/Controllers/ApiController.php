<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHeaders()
    {
        return [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Resource not found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respond($data, $headers = [])
    {
        header("Access-Control-Allow-Origin: *");

        return response()->json($data, $this->getStatusCode(), $this->getHeaders());
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => $message,
            'statusCode' => $this->getStatusCode()
        ], 404);
    }
}