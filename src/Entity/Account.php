<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"customer" = "Account", "admin" = "AdminAccount"})
 * @ORM\Table(name="account")
 * @ApiResource
 */
class Account
{

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
    }

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator")
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;


    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="json", options={"jsonb": true})
     *
     * @var array
     */
    protected $roles = [];


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function __toString()
    {
        return sprintf('%s', $this->getName());
    }

    public function getEmail(): string
    {
        return $this->email;
    }



    public function setEmail(string $email): Account
    {
        $this->email = $email;

        return $this;
    }



    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

}
