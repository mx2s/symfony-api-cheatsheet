<?php


namespace App\Bundle\Basics\ORMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Basics\Routing\Entity
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="App\Bundle\Basics\ORMBundle\Repository\PersonRepository")
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

    /**
     * @param string|null $name
     * @return Person
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}