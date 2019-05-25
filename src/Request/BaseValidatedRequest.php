<?php


namespace App\Request;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class BaseValidatedRequest
{
    /**
     * @return ConstraintViolationListInterface
     */
    public function validate() {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();
        return $validator->validate($this);
    }
}