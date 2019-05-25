<?php


namespace App\Basics\ORMBundle\Transformer;


use App\Basics\ORMBundle\Entity\Person;
use League\Fractal\TransformerAbstract;

class PersonTransformer extends TransformerAbstract
{
    /**
     * @param Person $person
     * @return array
     */
    public function transform(Person $person) {
        return [
            'id' => $person->getId(),
            'email' => $person->getEmail(),
            'name' => $person->getName()
        ];
    }

    /**
     * @param Person $person
     * @return array
     */
    public static function transformItem(Person $person) {
        $transformer = new self();
        return $transformer->transform($person);
    }
}