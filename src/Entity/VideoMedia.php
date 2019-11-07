<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoMediaRepository")
 */
class VideoMedia extends Media
{
    public const STORAGE_DIR = 'video/';

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getType(): string
    {
       return 'video';
    }
}
