<?php


namespace App\Basics\ORMBundle\Transformer;


use App\Basics\ORMBundle\Entity\Person;
use League\Fractal\TransformerAbstract;

class PersonTransformer extends TransformerAbstract
{
    public function transform(Person $person) {
        return [
            'id' => $person->getId(),
            'email' => $person->getEmail(),
            'name' => $person->getName()
        ];
    }
}