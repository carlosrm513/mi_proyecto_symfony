<?php

namespace App\Entity;

use App\Repository\ConnectionAuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConnectionAuditRepository::class)]
class ConnectionAudit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $audit_id = null;

    #[ORM\Column(type: Types::SMALLINT, options: ["comment" => "0: admin, 1: tipster"])]
    private ?int $user_type = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $connection_time = null;

    #[ORM\Column(length: 100)]
    private ?string $ip_address = null;

    #[ORM\Column(length: 255)]
    private ?string $user_agent = null;

    public function getId(): ?int
    {
        return $this->audit_id;
    }

    public function getUserType(): ?int
    {
        return $this->user_type;
    }

    public function setUserType(int $user_type): static
    {
        $this->user_type = $user_type;

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

    public function getConnectionTime(): ?\DateTimeInterface
    {
        return $this->connection_time;
    }

    public function setConnectionTime(\DateTimeInterface $connection_time): static
    {
        $this->connection_time = $connection_time;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address): static
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): static
    {
        $this->user_agent = $user_agent;

        return $this;
    }
}
