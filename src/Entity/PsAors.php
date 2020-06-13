<?php

namespace App\Entity;

use App\Repository\PsAorsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PsAorsRepository::class)
 */
class PsAors
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_contacts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMaxContacts(): ?int
    {
        return $this->max_contacts;
    }

    public function setMaxContacts(?int $max_contacts): self
    {
        $this->max_contacts = $max_contacts;

        return $this;
    }
}
