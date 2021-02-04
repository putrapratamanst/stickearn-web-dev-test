<?php

namespace App\Repository;

use App\Models\Result;

class ResultRepository
{
    protected $playerId;
    protected $word;

    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    public function resultByPlayerId()
    {
        return Result::where('player_id', $this->playerId)
            ->where('original_word', $this->word)
            ->first();
    }

    public function list()
    {
        return Result::where('player_id', $this->playerId)
            ->orderByDesc('id')
            ->get();
    }

    public static function listAll($idPlayer)
    {
        return Result::where('player_id', $idPlayer)
            ->orderByDesc('id')
            ->get();
    }
}
