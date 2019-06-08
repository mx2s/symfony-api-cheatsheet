<?php


namespace App\Bundle\Basics\Crud\Request;


use App\Request\BaseValidatedRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Class CreatePersonRequest
 * @package App\Bundle\Basics\Crud\Request
 */
class CreatePersonRequest extends BaseValidatedRequest
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $name;

    public function __construct(Request $request)
    {
        $this->name = $request->query->get('name');
        $this->email = $request->query->get('email');
    }

    /**
     * Validation data
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
}