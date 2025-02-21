<?php

namespace App\Entity;

use App\Repository\ServiceMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceMessageRepository::class)]
class ServiceMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $message_id = null;

    #[ORM\ManyToOne(targetEntity: ServiceOrders::class)]
    #[ORM\JoinColumn(name: "order_id", referencedColumnName: "order_id", nullable: false)]
    private ?ServiceOrders $order = null;

    #[ORM\Column]
    private ?int $sender_id = null;

    #[ORM\Column]
    private ?int $receiver_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $sent_at = null;

    public function getId(): ?int
    {
        return $this->message_id;
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

    public function getSenderId(): ?int
    {
        return $this->sender_id;
    }

    public function setSenderId(int $sender_id): static
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    public function getReceiverId(): ?int
    {
        return $this->receiver_id;
    }

    public function setReceiverId(int $receiver_id): static
    {
        $this->receiver_id = $receiver_id;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getSentAt(): ?\DateTimeInterface
    {
        return $this->sent_at;
    }

    public function setSentAt(\DateTimeInterface $sent_at): static
    {
        $this->sent_at = $sent_at;

        return $this;
    }
}
