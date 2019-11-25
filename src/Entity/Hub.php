<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="hub")
 * @ApiResource
 */
class Hub implements JsonSerializable
{

    /**
     * @var int
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}
