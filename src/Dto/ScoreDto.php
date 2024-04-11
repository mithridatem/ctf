<?php

namespace App\Dto;

readonly class ScoreDto
{
    public function __construct(
        private string $team,
        private int $score
    ) {
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
