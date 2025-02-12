<?php

namespace App\Entity;

use App\Repository\ServicePhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicePhotoRepository::class)]
class ServicePhoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $photo_id = null;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(name: "service_id", referencedColumnName: "service_id", nullable: false)]
    private ?Service $service = null;

    #[ORM\Column(length: 255)]
    private ?string $photo_url = null;

    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    private ?bool $is_cover = false;

    public function getId(): ?int
    {
        return $this->photo_id;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(string $photo_url): static
    {
        $this->photo_url = $photo_url;

        return $this;
    }

    public function isCover(): ?bool
    {
        return $this->is_cover;
    }

    public function setIsCover(?bool $is_cover): static
    {
        $this->is_cover = $is_cover;

        return $this;
    }
}
