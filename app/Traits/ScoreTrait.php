<?php

namespace App\Traits;

use App\Models\Score;
use App\Repository\ScoreRepository;

trait ScoreTrait
{
    public static function scoreByPlayer($playerId)
    {
        $repo = new ScoreRepository();
        $repo->setPlayerId($playerId);
        return $repo->scoreByPlayerId();
    }

    public static function saveScore($playerId, $status)
    {
        $score = $status == true ? 1 : -1;
        $model             = new Score();
        $model->player_id  = $playerId;
        $model->score      = $score;

        $model->save();
    }

    public static function deleteScore($playerId)
    {
        $model = self::scoreByPlayer($playerId);
        if($model) {
            $model->player_id  = $playerId;
            $model->score      = 0;
    
            $model->save();
        }
    }

    public static function updateScore($playerId, $status)
    {
        $detail = self::scoreByPlayer($playerId);
        $score  = $status == true ? $detail['score'] + 1 : $detail['score'] + (-1);
        $detail->score = $score;
        $detail->save();
    }
}
