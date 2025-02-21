<?php

namespace App\Entity;

use App\Repository\ServiceOrdersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceOrdersRepository::class)]
class ServiceOrders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $order_id = null;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(name: "service_id", referencedColumnName: "service_id", nullable: false)]
    private ?Service $service = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $order_date = null;

    public function getId(): ?int
    {
        return $this->order_id;
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

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }
}
