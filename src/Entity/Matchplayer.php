<?php

namespace App\Entity;

use App\Repository\MatchplayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchplayerRepository::class)
 */
class Matchplayer
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
    private $games_played;

    /**
     * @ORM\Column(type="integer")
     */
    private $min_played;

    /**
     * @ORM\Column(type="integer")
     */
    private $goals;

    /**
     * @ORM\Column(type="integer")
     */
    private $assists;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $player_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $team_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGamesPlayed(): ?int
    {
        return $this->games_played;
    }

    public function setGamesPlayed(int $games_played): self
    {
        $this->games_played = $games_played;

        return $this;
    }

    public function getMinPlayed(): ?int
    {
        return $this->min_played;
    }

    public function setMinPlayed(int $min_played): self
    {
        $this->min_played = $min_played;

        return $this;
    }

    public function getGoals(): ?int
    {
        return $this->goals;
    }

    public function setGoals(int $goals): self
    {
        $this->goals = $goals;

        return $this;
    }

    public function getAssists(): ?int
    {
        return $this->assists;
    }

    public function setAssists(int $assists): self
    {
        $this->assists = $assists;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPlayerId(): ?int
    {
        return $this->player_id;
    }

    public function setPlayerId(int $player_id): self
    {
        $this->player_id = $player_id;

        return $this;
    }

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function setTeamId(int $team_id): self
    {
        $this->team_id = $team_id;

        return $this;
    }
}
