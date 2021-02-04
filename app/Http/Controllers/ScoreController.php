<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ScoreTrait;

class ScoreController extends Controller
{
    use ScoreTrait;

    public function getScore(Request $request)
    {
        $getScore  = $this->scoreByPlayer($request->session()->get('player_id'));
        $score = 0;
        if($getScore) {
            $score = $getScore['score'] == 0 ? 0 : $getScore['score'].'00';
        }
        return response()->json($score, 200);
    }

    public function delete(Request $request)
    {
        $this->deleteScore($request->session()->get('player_id'));
    }
}
