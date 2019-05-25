<?php


namespace App\Basics\Crud\Request;


use App\Request\BaseValidatedRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;

class UpdatePersonRequest extends BaseValidatedRequest
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    public $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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