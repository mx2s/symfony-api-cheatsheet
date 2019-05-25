<?php


namespace App\Basics\Crud\Controller;

use App\Basics\ORMBundle\Entity\Person;
use App\Basics\ORMBundle\Transformer\PersonTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonCrudController extends AbstractController
{
    /**
     * @param string $id
     * @return object|void
     */
    public function get($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $person = $entityManager->getRepository(Person::class)->find($id);

        if (!$person) {
            return new JsonResponse([], 404);
        }

        return new JsonResponse([
            'data' => [
                'person' => PersonTransformer::transformItem($person)
            ]
        ]);
    }
}