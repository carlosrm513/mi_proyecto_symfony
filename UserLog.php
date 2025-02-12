<?php

namespace App\Entity;

use App\Repository\UserLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserLogRepository::class)]
class UserLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $log_id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $action = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $action_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $extra_info = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $readable_action = null;

    #[ORM\Column(nullable: true)]
    private ?int $external_id = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $external_table = null;

    public function getId(): ?int
    {
        return $this->log_id;
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

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getActionDate(): ?\DateTimeInterface
    {
        return $this->action_date;
    }

    public function setActionDate(?\DateTimeInterface $action_date): static
    {
        $this->action_date = $action_date;

        return $this;
    }

    public function getExtraInfo(): ?string
    {
        return $this->extra_info;
    }

    public function setExtraInfo(?string $extra_info): static
    {
        $this->extra_info = $extra_info;

        return $this;
    }

    public function getReadableAction(): ?string
    {
        return $this->readable_action;
    }

    public function setReadableAction(?string $readable_action): static
    {
        $this->readable_action = $readable_action;

        return $this;
    }

    public function getExternalId(): ?int
    {
        return $this->external_id;
    }

    public function setExternalId(?int $external_id): static
    {
        $this->external_id = $external_id;

        return $this;
    }

    public function getExternalTable(): ?string
    {
        return $this->external_table;
    }

    public function setExternalTable(?string $external_table): static
    {
        $this->external_table = $external_table;

        return $this;
    }
}
