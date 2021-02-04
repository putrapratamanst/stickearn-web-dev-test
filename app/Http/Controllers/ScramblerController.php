<?php

namespace App\Http\Controllers;

use App\Traits\ResultTrait;
use App\Traits\ScoreTrait;
use App\Traits\ScramblerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ScramblerController extends Controller
{
    use ScramblerTrait, ResultTrait, ScoreTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $request->session()->flush();
        return view('/welcome');
    }

    public function playground(Request $request)
    {
        return view('/scrambler/playground');
    }

    public function generate(Request $request)
    {
        $word = $this->generateWord($request);
        return response()->json($word, 200);
    }

    public function check(Request $request)
    {
        $playerId   = $request->session()->get('player_id');
        $request->validate([
            'original_word' => 'required',
            'form'          => 'required',
            'scramble_word' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $guessWord  = $this->queryParamToArray($request->form);
            $message    = "Awesome! It's Correct.  '$request->original_word'";
            $status     =  true;
            if(strcasecmp($guessWord, $request->original_word) != 0){
                $message = "Sorry, The Answer is '$request->original_word'" ;
                $status  = false;
            }
    
            $this->saveResult($playerId, $guessWord, $request->original_word, $request->scramble_word, $status);
    
            $scorePlayer = $this->scoreByPlayer($playerId);
            if(!$scorePlayer){
                $this->saveScore($playerId, $status);
            } else {
                $this->updateScore($playerId, $status);
            }
        } catch (Throwable $e){
            DB::rollBack();
            report($e);
        }

        DB::commit();
        return response()->json([
            'error'   => false,
            'message' => $message,
        ], 200);
    }
}
