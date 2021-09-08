<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="integer")
     */
    private $current_matchplayer_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $current_team_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getCurrentMatchplayerId(): ?int
    {
        return $this->current_matchplayer_id;
    }

    public function setCurrentMatchplayerId(int $current_matchplayer_id): self
    {
        $this->current_matchplayer_id = $current_matchplayer_id;

        return $this;
    }

    public function getCurrentTeamId(): ?int
    {
        return $this->current_team_id;
    }

    public function setCurrentTeamId(int $current_team_id): self
    {
        $this->current_team_id = $current_team_id;

        return $this;
    }
}
