<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoMediaRepository")
 */
class PhotoMedia extends Media
{
    public const STORAGE_DIR = 'photo/';

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ClimbingWay", inversedBy="photos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $climbingWay;

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getType(): string
    {
       return 'photo';
    }

    public function getClimbingWay(): ?ClimbingWay
    {
        return $this->climbingWay;
    }

    public function setClimbingWay(?ClimbingWay $climbingWay): self
    {
        $this->climbingWay = $climbingWay;

        return $this;
    }
}
