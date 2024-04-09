<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateScore = null;

    #[ORM\ManyToOne]
    private ?Team $team = null;

    /**
     * @var Collection<int, Token>
     */
    #[ORM\ManyToMany(targetEntity: Token::class)]
    private Collection $tokens;

    public function __construct()
    {
        $this->tokens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateScore(): ?\DateTimeInterface
    {
        return $this->dateScore;
    }

    public function setDateScore(\DateTimeInterface $dateScore): static
    {
        $this->dateScore = $dateScore;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Collection<int, Token>
     */
    public function getTokens(): Collection
    {
        return $this->tokens;
    }

    public function addToken(Token $token): static
    {
        if (!$this->tokens->contains($token)) {
            $this->tokens->add($token);
        }

        return $this;
    }

    public function removeToken(Token $token): static
    {
        $this->tokens->removeElement($token);

        return $this;
    }
}
