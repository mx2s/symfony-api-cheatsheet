<?php


namespace App\Basics\Routing\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validation;

/**
 * Class Person
 * @package App\Basics\Routing\Entity
 */
class Person
{
    /**
     * @Assert\Email()
     * @var string
     */
    public $email;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $name;

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraints('email', [
            new Assert\Email([
                'message' => 'The email {{ value }} is not a valid email.'
            ]),
            new Assert\NotBlank()
        ]);
    }

    /**
     * @return array
     */
    public function validate() {
        $result = [];

        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $errors = $validator->validate($this);

        foreach ($errors as $error) {
            $result[] = [
                'property' => $error->getPropertyPath(),
                'message' => $error->getMessage()
            ];
        }

        return $result;
    }
}