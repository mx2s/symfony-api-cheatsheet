<?php


namespace App\Transformers;


use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationErrorsTransformer
{
    /**
     * @param ConstraintViolationListInterface $errors
     * @return array
     */
    public static function transform(ConstraintViolationListInterface $errors)
    {
        $result = [];
        foreach ($errors as $error) {
            $result[] = [
                'property' => $error->getPropertyPath(),
                'message' => $error->getMessage()
            ];
        }
        return $result;
    }
}