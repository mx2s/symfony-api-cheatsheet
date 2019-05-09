<?php


namespace App\Basics\Routing\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;

class BaseRoutingController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'success' => true
        ]);
    }
}