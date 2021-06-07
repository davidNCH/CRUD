<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta")
 * @ORM\Entity
 */
class Venta
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
     * @ORM\Column(name="Dni", type="string", length=8, nullable=false)
     */
    private $dni;

    /**
     * @var int
     *
     * @ORM\Column(name="Codcoche", type="integer", nullable=false)
     */
    private $codcoche;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=20, nullable=false)
     */
    private $color;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?int
    {
        return $this->dni;
    }

    public function setDni(int $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getCodcoche(): ?int
    {
        return $this->codcoche;
    }

    public function setCodcoche(int $codcoche): self
    {
        $this->codcoche = $codcoche;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }


}
