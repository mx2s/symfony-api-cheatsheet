<?php


namespace App\Basics\ORMBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validation;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Basics\Routing\Entity
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="App\Basics\ORMBundle\Repository\PersonRepository")
 */

class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Person
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

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

    public function transform() {

    }
}