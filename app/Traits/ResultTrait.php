<?php

namespace App\Traits;

use App\Models\Result;
use App\Repository\ResultRepository;

trait ResultTrait
{
    public static function resultByPlayer($playerId)
    {
        $repo = new ResultRepository();
        $repo->setPlayerId($playerId);
        return $repo->resultByPlayerId();
    }

    public static function saveResult($playerId, $guessWord, $originalWord, $scrambleWord, $status)
    {
        $model                 = new Result();
        $model->player_id      = $playerId;
        $model->answer         = $guessWord;
        $model->scramble_word  = $scrambleWord;
        $model->original_word  = $originalWord;
        $model->status         = $status;

        $model->save();
    }

    public function listData($playerId)
    {
        $repo = new ResultRepository();
        $repo->setPlayerId($playerId);
        return $repo->list();
    }
}
