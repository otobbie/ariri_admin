<?php 

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Generate a success response
     * 
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @param array $meta
     * @return JsonResponse
     */
    public function successResponse($data = [], $message = 'Success',  $meta=[], $status= 200)
    {
       return response()->json([
        'success' => true,
        'data'    => $data,
        'message' => $message,
        'meta'    => $meta
       ], $status); 
    }

      /**
     * Generate a error response
     * 
     * @param string $message
     * @param string $error
     * @param int $status
     * @param array $meta
     * @return JsonResponse
     */
    public function errorResponse($message = 'Error', $status= 400, $error = '' )
    {
       return response()->json([
        'success' => false,
        'message' => $message,
        'error'   => $error
       ], $status); 
    }
}
