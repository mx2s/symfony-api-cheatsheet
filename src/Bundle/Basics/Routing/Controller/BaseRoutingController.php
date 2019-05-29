<?php


namespace App\Bundle\Basics\Routing\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Simple routing + creating entity example
 * Class BaseRoutingController
 * @package App\Basics\Routing\Controller
 */
class BaseRoutingController extends AbstractController
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

    /**
     * @param int $param1
     * @return JsonResponse
     */
    public function route1(int $param1): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'data' => [
                'url_params' => [
                    'param1' => $param1
                ]
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function route2(Request $request): JsonResponse {
        return new JsonResponse([
            'success' => true,
            'data' => [
                'request_params' => $request->query->all()
            ]
        ]);
    }
}