<?php

namespace App\Entity;

use App\Repository\TraductionTargetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraductionTargetRepository::class)
 */
class TraductionTarget
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lang_code;

    /**
     * @ORM\Column(type="integer")
     */
    private $Traduction_source_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangCode(): ?string
    {
        return $this->Lang_code;
    }

    public function setLangCode(string $Lang_code): self
    {
        $this->Lang_code = $Lang_code;

        return $this;
    }

    public function getTraductionSourceId(): ?int
    {
        return $this->Traduction_source_id;
    }

    public function setTraductionSourceId(int $Traduction_source_id): self
    {
        $this->Traduction_source_id = $Traduction_source_id;

        return $this;
    }
}
