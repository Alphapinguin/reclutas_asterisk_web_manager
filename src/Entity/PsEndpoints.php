<?php

namespace App\Entity;

use App\Repository\PsEndpointsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PsEndpointsRepository::class)
 */
class PsEndpoints
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aors;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $context;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disallow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $direct_media;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTransport(): ?string
    {
        return $this->transport;
    }

    public function setTransport(?string $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getAors(): ?string
    {
        return $this->aors;
    }

    public function setAors(?string $aors): self
    {
        $this->aors = $aors;

        return $this;
    }

    public function getAuth(): ?string
    {
        return $this->auth;
    }

    public function setAuth(?string $auth): self
    {
        $this->auth = $auth;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(?string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getDisallow(): ?string
    {
        return $this->disallow;
    }

    public function setDisallow(?string $disallow): self
    {
        $this->disallow = $disallow;

        return $this;
    }

    public function getAllow(): ?string
    {
        return $this->allow;
    }

    public function setAllow(?string $allow): self
    {
        $this->allow = $allow;

        return $this;
    }

    public function getDirectMedia(): ?string
    {
        return $this->direct_media;
    }

    public function setDirectMedia(?string $direct_media): self
    {
        $this->direct_media = $direct_media;

        return $this;
    }
}
