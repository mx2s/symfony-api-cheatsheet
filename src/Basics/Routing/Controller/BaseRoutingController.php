<?php


namespace App\Basics\Routing\Controller;


use App\Basics\Routing\Entity\Person;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function route3(Request $request): JsonResponse
    {
        $person = new Person();
        $person->email = $request->query->get('email');
        $person->name = $request->query->get('name');

        $errors = $person->validate();

        if (count($errors) > 0) {
            return new JsonResponse([
                'errors' => $errors
            ], 422);
        }

        return new JsonResponse([
            'data' => [
                'person' => $person
            ],
            'errors' => $errors
        ]);
    }
}