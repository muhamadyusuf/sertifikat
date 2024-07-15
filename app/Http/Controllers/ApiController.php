<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Send a success response.
     *
     * @param int $code
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($message, $data = array(), $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $this->normalizeResult($data),
        ], $statusCode);
    }

    /**
     * Send a success created response.
     *
     * @param int $code
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendCreatedResponse($message, $data = array(), $statusCode = 201)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $this->normalizeResult($data),
        ], $statusCode);
    }

    /**
     * Send an error response.
     *
     * @param int $code
     * @param string $status
     * @param array $errorMessages
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($message, $errorMessages, $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errorMessages,
        ], $statusCode);
    }

    /**
     * Send an unauthorized (401) error response.
     *
     * @param int $code
     * @param string $status
     * @param array $errorMessages
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendUnauthorized($status, $errorMessages = array())
    {
        return $this->sendError($status, $errorMessages, 401);
    }

    /**
     * Send a forbidden (403) error response.
     *
     * @param int $code
     * @param string $status
     * @param array $errorMessages
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendForbidden($status, $errorMessages = array())
    {
        return $this->sendError($status, $errorMessages, 403);
    }

    /**
     * Send a not found (404) error response.
     *
     * @param int $code
     * @param string $status
     * @param array $errorMessages
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotFound($status, $errorMessages = array())
    {
        return $this->sendError($status, $errorMessages, 404);
    }

    /**
     * Send a server error (500) response.
     *
     * @param int $code
     * @param string $status
     * @param array $errorMessages
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendServerError($status, $errorMessages = array())
    {
        return $this->sendError($status, $errorMessages, 500);
    }

    /**
     * Normalize the result by converting null values to empty strings.
     *
     * @param mixed $result
     * @return mixed
     */
    public function normalizeResult($result)
    {
        $result = json_decode(json_encode($result), true);

        array_walk_recursive($result, function (&$value) {
            $value = !is_null($value) ? $value : "";
        });

        return $result;
    }
}
