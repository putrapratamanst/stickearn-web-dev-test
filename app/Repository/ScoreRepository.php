<?php

namespace App\Repository;

use App\Models\Score;

class ScoreRepository
{
    protected $playerId;

    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
    }

    public function scoreByPlayerId()
    {
        return Score::where('player_id', $this->playerId)
            ->first();
    }
}
