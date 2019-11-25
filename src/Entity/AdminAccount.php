<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ApiResource
 */
class AdminAccount extends Account
{
    public function __construct()
    {
        parent::__construct();
        $this->associatedHubs = new ArrayCollection();
    }

    /**
     * @var Hub
     * @ORM\ManyToOne(targetEntity="App\Entity\Hub")
     * @Groups({"admin:read", "owner:read", "admin:write"})
     */
    protected $defaultHub;

    /**
     * Vmm Account can have multiple hubs associated.
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Hub")
     * @Groups({"admin:read", "admin:write"})
     * @ORM\JoinTable(name="vmm_account_hubs",
     *      joinColumns={@ORM\JoinColumn(name="account_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="hub_id", referencedColumnName="id")}
     *  )
     */
    private $associatedHubs;

    public function getDefaultHub(): Hub
    {
        return $this->defaultHub;
    }

    /**
     * @param Hub $defaultHub
     * @return VmmAccount
     */
    public function setDefaultHub(Hub $defaultHub)
    {
        $this->defaultHub = $defaultHub;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAssociatedHubs()
    {
        return null === $this->associatedHubs ? new ArrayCollection() : $this->associatedHubs;
    }

    /**
     * @param ArrayCollection $associatedHubs
     *
     * @return VmmAccount
     */
    public function setAssociatedHubs($associatedHubs)
    {
        $this->associatedHubs = $associatedHubs;

        return $this;
    }
}
