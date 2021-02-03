<?php

namespace App\Traits;

use App\Repository\ScoreRepository;

trait ScoreTrait
{
    private $repo;

    public function __construct(ScoreRepository $repo)
    {
        $this->repo = $repo;
    }

    public function scoreByPlayer($playerId)
    {
        $this->repo->setPlayerId($playerId);
        return $this->repo->scoreByPlayerId();
    }
}
