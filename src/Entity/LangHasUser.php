<?php

namespace App\Entity;

use App\Repository\LangHasUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LangHasUserRepository::class)
 */
class LangHasUser
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
    private $User_id;

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

    public function getUserId(): ?int
    {
        return $this->User_id;
    }

    public function setUserId(int $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }
}
