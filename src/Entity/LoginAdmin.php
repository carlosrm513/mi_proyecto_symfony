<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * LoginAdmin
 *
 * @ORM\Table(name="login_admin")
 * @ORM\Entity(repositoryClass="App\Repository\LoginAdminRepository")
 */
class LoginAdmin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=256, nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password_id", type="string", length=40, nullable=false)
     */
    private $passwordId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plainpassword", type="string", length=255, nullable=true)
     */
    private $plainpassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="nivel_user", type="boolean", nullable=true)
     */
    private $nivelUser;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=255, nullable=false, options={"comment"="ROLE_ADMIN, ROLE_AFFILIATE, ROLE_SUPERADMIN"})
     */
    private $roles;

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=24, nullable=true)
     */
    private $telefono;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ultimoacceso", type="datetime", nullable=true)
     */
    private $ultimoacceso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="myip", type="string", length=20, nullable=true)
     */
    private $myip;

    /**
     * @var int
     *
     * @ORM\Column(name="es_responsable", type="integer", nullable=false, options={"default"="1"})
     */
    private $esResponsable = 1;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="impersonate_token", type="string", length=45, nullable=true)
     */
    private $impersonateToken;

    /**
     * @var int|null
     *
     * @ORM\Column(name="impersonate_ts", type="integer", nullable=true)
     */
    private $impersonateTs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPasswordId(): ?string
    {
        return $this->passwordId;
    }

    public function setPasswordId(string $passwordId): static
    {
        $this->passwordId = $passwordId;

        return $this;
    }

    public function getPlainpassword(): ?string
    {
        return $this->plainpassword;
    }

    public function setPlainpassword(?string $plainpassword): static
    {
        $this->plainpassword = $plainpassword;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function isNivelUser(): ?bool
    {
        return $this->nivelUser;
    }

    public function setNivelUser(?bool $nivelUser): static
    {
        $this->nivelUser = $nivelUser;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getResponsable(): ?int
    {
        return $this->responsable;
    }

    public function setResponsable(?int $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): static
    {
        $this->lang = $lang;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getUltimoacceso(): ?\DateTimeInterface
    {
        return $this->ultimoacceso;
    }

    public function setUltimoacceso(?\DateTimeInterface $ultimoacceso): static
    {
        $this->ultimoacceso = $ultimoacceso;

        return $this;
    }

    public function getMyip(): ?string
    {
        return $this->myip;
    }

    public function setMyip(?string $myip): static
    {
        $this->myip = $myip;

        return $this;
    }

    public function getEsResponsable(): ?int
    {
        return $this->esResponsable;
    }

    public function setEsResponsable(int $esResponsable): static
    {
        $this->esResponsable = $esResponsable;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    public function getImpersonateToken(): ?string
    {
        return $this->impersonateToken;
    }

    public function setImpersonateToken(?string $impersonateToken): static
    {
        $this->impersonateToken = $impersonateToken;

        return $this;
    }

    public function getImpersonateTs(): ?int
    {
        return $this->impersonateTs;
    }

    public function setImpersonateTs(?int $impersonateTs): static
    {
        $this->impersonateTs = $impersonateTs;

        return $this;
    }


}
