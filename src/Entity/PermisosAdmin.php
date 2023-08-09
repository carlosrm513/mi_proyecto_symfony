<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PermisosAdmin
 *
 * @ORM\Table(name="permisos_admin", indexes={@ORM\Index(name="fk_permisos_admin_login_admin1_idx", columns={"login_admin_id"}), @ORM\Index(name="fk_permisos_admin_permiso1_idx", columns={"permiso_idpermiso"})})
 * @ORM\Entity(repositoryClass="App\Repository\PermisosAdminRepository")
 */
class PermisosAdmin
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpermisos_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpermisosAdmin;

    /**
     * @var \Permiso
     *
     * @ORM\ManyToOne(targetEntity="Permiso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permiso_idpermiso", referencedColumnName="idpermiso")
     * })
     */
    private $permisoIdpermiso;

    /**
     * @var \LoginAdmin
     *
     * @ORM\ManyToOne(targetEntity="LoginAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_admin_id", referencedColumnName="id")
     * })
     */
    private $loginAdmin;

    public function getIdpermisosAdmin(): ?int
    {
        return $this->idpermisosAdmin;
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

    public function getLoginAdmin(): ?LoginAdmin
    {
        return $this->loginAdmin;
    }

    public function setLoginAdmin(?LoginAdmin $loginAdmin): static
    {
        $this->loginAdmin = $loginAdmin;

        return $this;
    }


}
