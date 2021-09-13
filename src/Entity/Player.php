<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $current_matchplayer_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $current_team_id;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="players")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=Matchplayer::class, mappedBy="player")
     */
    private $matchplayer;

    public function __construct()
    {
        $this->matchplayer = new ArrayCollection();
    }

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

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Collection|Matchplayer[]
     */
    public function getMatchplayer(): Collection
    {
        return $this->matchplayer;
    }

    public function addMatchplayer(Matchplayer $matchplayer): self
    {
        if (!$this->matchplayer->contains($matchplayer)) {
            $this->matchplayer[] = $matchplayer;
            $matchplayer->setPlayer($this);
        }

        return $this;
    }

    public function removeMatchplayer(Matchplayer $matchplayer): self
    {
        if ($this->matchplayer->removeElement($matchplayer)) {
            // set the owning side to null (unless already changed)
            if ($matchplayer->getPlayer() === $this) {
                $matchplayer->setPlayer(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
