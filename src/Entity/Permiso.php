<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permiso
 *
 * @ORM\Table(name="permiso")
 * @ORM\Entity(repositoryClass="App\Repository\PermisoRepository")
 */
class Permiso
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpermiso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpermiso;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ruta", type="string", length=255, nullable=true)
     */
    private $ruta;

    /**
     * @var bool
     *
     * @ORM\Column(name="escritura", type="boolean", nullable=false)
     */
    private $escritura;

    /**
     * @var bool
     *
     * @ORM\Column(name="lectura", type="boolean", nullable=false)
     */
    private $lectura;

    public function getIdpermiso(): ?int
    {
        return $this->idpermiso;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    public function setRuta(?string $ruta): static
    {
        $this->ruta = $ruta;

        return $this;
    }

    public function isEscritura(): ?bool
    {
        return $this->escritura;
    }

    public function setEscritura(bool $escritura): static
    {
        $this->escritura = $escritura;

        return $this;
    }

    public function isLectura(): ?bool
    {
        return $this->lectura;
    }

    public function setLectura(bool $lectura): static
    {
        $this->lectura = $lectura;

        return $this;
    }


}
