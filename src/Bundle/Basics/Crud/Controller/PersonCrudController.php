<?php


namespace App\Bundle\Basics\Crud\Controller;

use App\Bundle\Basics\Crud\Request\CreatePersonRequest;
use App\Bundle\Basics\Crud\Request\UpdatePersonRequest;
use App\Entity\Person;
use App\Transformer\PersonTransformer;
use App\Transformer\ValidationErrorsTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * https://symfony.com/doc/current/doctrine.html
 *
 * Class PersonCrudController
 * @package App\Basics\Crud\Controller
 */
class PersonCrudController extends AbstractController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $validatedRequest = new CreatePersonRequest($request);

        $errors = $validatedRequest->validate();

        if (count($errors) > 0) {
            return new JsonResponse([
                'errors' => ValidationErrorsTransformer::transform($errors)
            ], 422);
        }

        $person = new Person();
        $person->setEmail($request->query->get('email'));
        $person->setName($request->query->get('name'));

        $entityManager->persist($person);
        $entityManager->flush();

        return new JsonResponse([
            'data' => [
                'person' => PersonTransformer::transformItem($person)
            ]
        ], 201);
    }

    /**
     * @param int $id
     * @return object|JsonResponse
     */
    public function get($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $person = $entityManager->getRepository(Person::class)->find($id);

        if (!$person) {
            return new JsonResponse(null, 404);
        }

        return new JsonResponse([
            'data' => [
                'person' => PersonTransformer::transformItem($person)
            ]
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $validatedRequest = new UpdatePersonRequest($request);

        $errors = $validatedRequest->validate();

        if (count($errors) > 0) {
            return new JsonResponse([
                'errors' => ValidationErrorsTransformer::transform($errors)
            ], 422);
        }

        $person = $entityManager->getRepository(Person::class)->find($id);

        if (!$person) {
            return new JsonResponse(null, 404);
        }

        $person->setEmail($validatedRequest->email);
        $person->setName($validatedRequest->name);

        $entityManager->flush();

        return new JsonResponse([
            'data' => [
                'person' => PersonTransformer::transformItem($person)
            ]
        ], 201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $person = $entityManager->getRepository(Person::class)->find($id);

        if (!$person) {
            return new JsonResponse(null, 404);
        }

        $entityManager->remove($person);
        $entityManager->flush();

        return new JsonResponse(null);
    }
}