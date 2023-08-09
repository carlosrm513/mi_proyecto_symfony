<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PermisosPerfil
 *
 * @ORM\Table(name="permisos_perfil", indexes={@ORM\Index(name="fk_permisos_perfil_perfil1_idx", columns={"perfil_idperfil"}), @ORM\Index(name="fk_permisos_perfil_permiso1_idx", columns={"permiso_idpermiso"})})
 * @ORM\Entity(repositoryClass="App\Repository\PermisosPerfilRepository")
 */
class PermisosPerfil
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpermisos_perfil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpermisosPerfil;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perfil_idperfil", referencedColumnName="idperfil")
     * })
     */
    private $perfilIdperfil;

    /**
     * @var \Permiso
     *
     * @ORM\ManyToOne(targetEntity="Permiso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permiso_idpermiso", referencedColumnName="idpermiso")
     * })
     */
    private $permisoIdpermiso;

    public function getIdpermisosPerfil(): ?int
    {
        return $this->idpermisosPerfil;
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

    public function getPermisoIdpermiso(): ?Permiso
    {
        return $this->permisoIdpermiso;
    }

    public function setPermisoIdpermiso(?Permiso $permisoIdpermiso): static
    {
        $this->permisoIdpermiso = $permisoIdpermiso;

        return $this;
    }


}
