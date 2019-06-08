<?php


namespace App\Bundle\Basics\Crud\Request;


use App\Request\BaseValidatedRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Class CreateArticleRequest
 * @package App\Bundle\Basics\Crud\Request
 */
class CreateArticleRequest extends BaseValidatedRequest
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var int
     */
    public $personId;

    /**
     * CreateArticleRequest constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $query = $request->query;
        $this->title = $request->get('title');
        $this->content = $query->get('content');
        $this->personId = $query->get('person_id');
    }

    /**
     * Validation data
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('title', new Assert\NotBlank());
        $metadata->addPropertyConstraint('content', new Assert\NotBlank());
    }
}