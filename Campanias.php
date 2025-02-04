<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campanias
 *
 * @ORM\Table(name="campanias", indexes={@ORM\Index(name="ix_id_casa", columns={"id_casa"}), @ORM\Index(name="fk_campanias_login_admin1_idx", columns={"login_admin_id_coordinator"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasRepository")
 */
class Campanias
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
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="titcamp", type="string", length=256, nullable=false)
     */
    private $titcamp;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=256, nullable=false)
     */
    private $condiciones;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp", type="text", length=65535, nullable=true)
     */
    private $txtcamp;

    /**
     * @var string
     *
     * @ORM\Column(name="titcamp_en", type="string", length=256, nullable=false)
     */
    private $titcampEn;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones_en", type="string", length=256, nullable=false)
     */
    private $condicionesEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp_en", type="text", length=65535, nullable=true)
     */
    private $txtcampEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp_pt", type="text", length=65535, nullable=true)
     */
    private $txtcampPt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp_it", type="text", length=65535, nullable=true)
     */
    private $txtcampIt;

    /**
     * @var float
     *
     * @ORM\Column(name="comisioncamp", type="float", precision=9, scale=2, nullable=false)
     */
    private $comisioncamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtlanding", type="string", length=255, nullable=true)
     */
    private $txtlanding;

    /**
     * @var int|null
     *
     * @ORM\Column(name="campaniapublica", type="integer", nullable=true)
     */
    private $campaniapublica;

    /**
     * @var bool
     *
     * @ORM\Column(name="actcamp", type="boolean", nullable=false)
     */
    private $actcamp;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_vip", type="boolean", nullable=true)
     */
    private $esVip = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var bool
     *
     * @ORM\Column(name="mostrarpublico", type="boolean", nullable=false, options={"default"="1"})
     */
    private $mostrarpublico = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="connection_api", type="string", length=255, nullable=true)
     */
    private $connectionApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uri_enlaces", type="string", length=255, nullable=true)
     */
    private $uriEnlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma_principal", type="string", length=10, nullable=false, options={"default"="es"})
     */
    private $idiomaPrincipal = 'es';

    /**
     * @var array|null
     *
     * @ORM\Column(name="paises", type="json", nullable=true)
     */
    private $paises;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casa_iapuestas", type="integer", nullable=true)
     */
    private $casaIapuestas = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="crear_enlaces", type="integer", nullable=false)
     */
    private $crearEnlaces = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true, options={"default"="NULL","comment"="Manager de la campania"})
     */
    private $responsable;

    /**
     * @var float|null
     *
     * @ORM\Column(name="deposit", type="float", precision=8, scale=2, nullable=true)
     */
    private $deposit;

    /**
     * @var float
     *
     * @ORM\Column(name="wagering", type="float", precision=8, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $wagering = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency = '';

    /**
     * @var string
     *
     * @ORM\Column(name="multiplicador", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $multiplicador = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="rs_bdeal", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $rsBdeal = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="fee", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $fee = '0.00';

    /**
     * @var bool
     *
     * @ORM\Column(name="compliance", type="boolean", nullable=false)
     */
    private $compliance = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="generate_link", type="integer", nullable=true, options={"default"="NULL","comment"="Un numero entero que definira el tipo de enlace a generar"})
     */
    private $generateLink;

    /**
     * @var \LoginAdmin
     *
     * @ORM\ManyToOne(targetEntity="LoginAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_admin_id_coordinator", referencedColumnName="id")
     * })
     */
    private $loginAdminIdCoordinator;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCasa(): ?int
    {
        return $this->idCasa;
    }

    public function setIdCasa(int $idCasa): self
    {
        $this->idCasa = $idCasa;

        return $this;
    }

    public function getTitcamp(): ?string
    {
        return $this->titcamp;
    }

    public function setTitcamp(string $titcamp): self
    {
        $this->titcamp = $titcamp;

        return $this;
    }

    public function getCondiciones(): ?string
    {
        return $this->condiciones;
    }

    public function setCondiciones(string $condiciones): self
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    public function getTxtcamp(): ?string
    {
        return $this->txtcamp;
    }

    public function setTxtcamp(?string $txtcamp): self
    {
        $this->txtcamp = $txtcamp;

        return $this;
    }

    public function getTitcampEn(): ?string
    {
        return $this->titcampEn;
    }

    public function setTitcampEn(string $titcampEn): self
    {
        $this->titcampEn = $titcampEn;

        return $this;
    }

    public function getCondicionesEn(): ?string
    {
        return $this->condicionesEn;
    }

    public function setCondicionesEn(string $condicionesEn): self
    {
        $this->condicionesEn = $condicionesEn;

        return $this;
    }

    public function getTxtcampEn(): ?string
    {
        return $this->txtcampEn;
    }

    public function setTxtcampEn(?string $txtcampEn): self
    {
        $this->txtcampEn = $txtcampEn;

        return $this;
    }

    public function getTxtcampPt(): ?string
    {
        return $this->txtcampPt;
    }

    public function setTxtcampPt(?string $txtcampPt): self
    {
        $this->txtcampPt = $txtcampPt;

        return $this;
    }

    public function getTxtcampIt(): ?string
    {
        return $this->txtcampIt;
    }

    public function setTxtcampIt(?string $txtcampIt): self
    {
        $this->txtcampIt = $txtcampIt;

        return $this;
    }

    public function getComisioncamp(): ?float
    {
        return $this->comisioncamp;
    }

    public function setComisioncamp(float $comisioncamp): self
    {
        $this->comisioncamp = $comisioncamp;

        return $this;
    }

    public function getTxtlanding(): ?string
    {
        return $this->txtlanding;
    }

    public function setTxtlanding(?string $txtlanding): self
    {
        $this->txtlanding = $txtlanding;

        return $this;
    }

    public function getCampaniapublica(): ?int
    {
        return $this->campaniapublica;
    }

    public function setCampaniapublica(?int $campaniapublica): self
    {
        $this->campaniapublica = $campaniapublica;

        return $this;
    }

    public function getActcamp(): ?bool
    {
        return $this->actcamp;
    }

    public function setActcamp(bool $actcamp): self
    {
        $this->actcamp = $actcamp;

        return $this;
    }

    public function getEsVip(): ?bool
    {
        return $this->esVip;
    }

    public function setEsVip(?bool $esVip): self
    {
        $this->esVip = $esVip;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getMostrarpublico(): ?bool
    {
        return $this->mostrarpublico;
    }

    public function setMostrarpublico(bool $mostrarpublico): self
    {
        $this->mostrarpublico = $mostrarpublico;

        return $this;
    }

    public function getConnectionApi(): ?string
    {
        return $this->connectionApi;
    }

    public function setConnectionApi(?string $connectionApi): self
    {
        $this->connectionApi = $connectionApi;

        return $this;
    }

    public function getUriEnlaces(): ?string
    {
        return $this->uriEnlaces;
    }

    public function setUriEnlaces(?string $uriEnlaces): self
    {
        $this->uriEnlaces = $uriEnlaces;

        return $this;
    }

    public function getIdiomaPrincipal(): ?string
    {
        return $this->idiomaPrincipal;
    }

    public function setIdiomaPrincipal(string $idiomaPrincipal): self
    {
        $this->idiomaPrincipal = $idiomaPrincipal;

        return $this;
    }

    public function getPaises(): ?array
    {
        return $this->paises;
    }

    public function setPaises(?array $paises): self
    {
        $this->paises = $paises;

        return $this;
    }

    public function getCasaIapuestas(): ?int
    {
        return $this->casaIapuestas;
    }

    public function setCasaIapuestas(?int $casaIapuestas): self
    {
        $this->casaIapuestas = $casaIapuestas;

        return $this;
    }

    public function getCrearEnlaces(): ?int
    {
        return $this->crearEnlaces;
    }

    public function setCrearEnlaces(int $crearEnlaces): self
    {
        $this->crearEnlaces = $crearEnlaces;

        return $this;
    }

    public function getResponsable(): ?int
    {
        return $this->responsable;
    }

    public function setResponsable(?int $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDeposit(): ?float
    {
        return $this->deposit;
    }

    public function setDeposit(?float $deposit): self
    {
        $this->deposit = $deposit;

        return $this;
    }

    public function getWagering(): ?float
    {
        return $this->wagering;
    }

    public function setWagering(float $wagering): self
    {
        $this->wagering = $wagering;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getMultiplicador(): ?string
    {
        return $this->multiplicador;
    }

    public function setMultiplicador(string $multiplicador): self
    {
        $this->multiplicador = $multiplicador;

        return $this;
    }

    public function getRsBdeal(): ?string
    {
        return $this->rsBdeal;
    }

    public function setRsBdeal(string $rsBdeal): self
    {
        $this->rsBdeal = $rsBdeal;

        return $this;
    }

    public function getFee(): ?string
    {
        return $this->fee;
    }

    public function setFee(string $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    public function isCompliance(): ?bool
    {
        return $this->compliance;
    }

    public function setCompliance(bool $compliance): self
    {
        $this->compliance = $compliance;

        return $this;
    }

    public function getGenerateLink(): ?int
    {
        return $this->generateLink;
    }

    public function setGenerateLink(?int $generateLink): self
    {
        $this->generateLink = $generateLink;

        return $this;
    }

    public function getLoginAdminIdCoordinator(): ?LoginAdmin
    {
        return $this->loginAdminIdCoordinator;
    }

    public function setLoginAdminIdCoordinator(?LoginAdmin $loginAdminIdCoordinator): self
    {
        $this->loginAdminIdCoordinator = $loginAdminIdCoordinator;

        return $this;
    }


}
