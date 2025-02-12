<?php

namespace App\Entity;

use App\Repository\ServiceContractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceContractRepository::class)]
class ServiceContract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $contract_id = null;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(name: "service_id", referencedColumnName: "service_id", nullable: false)]
    private ?Service $service = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $contract_date = null;

    public function getId(): ?int
    {
        return $this->contract_id;
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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getContractDate(): ?\DateTimeInterface
    {
        return $this->contract_date;
    }

    public function setContractDate(\DateTimeInterface $contract_date): static
    {
        $this->contract_date = $contract_date;

        return $this;
    }
}
