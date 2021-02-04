<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResultTrait;

class ResultController extends Controller
{
    use ResultTrait;

    public function history(Request $request)
    {
        $getScore  = $this->listData($request->session()->get('player_id'));

        return view('/result/history', [
            'scores' => $getScore
        ]);
    }

    public function historyInAdmin($playerId)
    {
        $getScore  = $this->listData($playerId);

        return view('/admin/history-player', [
            'scores' => $getScore
        ]);
    }
}
