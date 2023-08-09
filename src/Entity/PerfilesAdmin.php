<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerfilesAdmin
 *
 * @ORM\Table(name="perfiles_admin", indexes={@ORM\Index(name="fk_perfil_admin_login_admin1_idx", columns={"login_admin_id"}), @ORM\Index(name="fk_perfil_admin_perfil1_idx", columns={"perfil_idperfil"})})
 * @ORM\Entity(repositoryClass="App\Repository\PerfilesAdminRepository")
 */
class PerfilesAdmin
{
    /**
     * @var int
     *
     * @ORM\Column(name="idperfiles_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperfilesAdmin;

    /**
     * @var \LoginAdmin
     *
     * @ORM\ManyToOne(targetEntity="LoginAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_admin_id", referencedColumnName="id")
     * })
     */
    private $loginAdmin;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perfil_idperfil", referencedColumnName="idperfil")
     * })
     */
    private $perfilIdperfil;

    public function getIdperfilesAdmin(): ?int
    {
        return $this->idperfilesAdmin;
    }

    public function getLoginAdmin(): ?LoginAdmin
    {
        return $this->loginAdmin;
    }

    public function setLoginAdmin(?LoginAdmin $loginAdmin): static
    {
        $this->loginAdmin = $loginAdmin;

        return $this;
    }

    public function getPerfilIdperfil(): ?Perfil
    {
        return $this->perfilIdperfil;
    }

    public function setPerfilIdperfil(?Perfil $perfilIdperfil): static
    {
        $this->perfilIdperfil = $perfilIdperfil;

        return $this;
    }


}
