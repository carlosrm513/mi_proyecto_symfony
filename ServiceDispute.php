<?php

namespace App\Entity;

use App\Repository\ServiceDisputeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceDisputeRepository::class)]
class ServiceDispute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $dispute_id = null;

    #[ORM\ManyToOne(targetEntity: ServiceOrders::class)]
    #[ORM\JoinColumn(name: "order_id", referencedColumnName: "order_id", nullable: false)]
    private ?ServiceOrders $order = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $admin_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reason = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $response = null;

    #[ORM\Column(type: Types::SMALLINT, options: ["default" => 0])]
    private ?int $status = 0;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $resolved_at = null;

    public function getId(): ?int
    {
        return $this->dispute_id;
    }

    public function getOrder(): ?ServiceOrders
    {
        return $this->order;
    }

    public function setOrder(ServiceOrders $order): static
    {
        $this->order = $order;

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

    public function getAdminId(): ?int
    {
        return $this->admin_id;
    }

    public function setAdminId(?int $admin_id): static
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): static
    {
        $this->reason = $response;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getResolvedAt(): ?\DateTimeInterface
    {
        return $this->resolved_at;
    }

    public function setResolvedAt(?\DateTimeInterface $resolved_at): static
    {
        $this->resolved_at = $resolved_at;

        return $this;
    }
}
