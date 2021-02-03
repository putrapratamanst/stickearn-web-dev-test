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
            $score = $score['score'];
        }
        return response()->json($score, 200);
    }
}
