<?php

namespace App\Entity;

use App\Repository\TraductionSourceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraductionSourceRepository::class)
 */
class TraductionSource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Project_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $source;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectId(): ?int
    {
        return $this->Project_id;
    }

    public function setProjectId(int $Project_id): self
    {
        $this->Project_id = $Project_id;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }
}
