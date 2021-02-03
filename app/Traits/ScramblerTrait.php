<?php

namespace App\Traits;

use Faker\Factory as Faker;
use App\Http\Helpers\EnglishWords;
use App\Repository\ResultRepository;
use Illuminate\Support\Facades\Storage;

/**
 * 
 */
trait ScramblerTrait
{
    public static function queryParamToArray($queryParam)
    {
       parse_str($queryParam, $output);

       return $output['guess_word'];
    }

    public function generateWord($request)
    {
        $storage    = Storage::disk('local')->get('vocab.json');
        $array      = explode(',', $storage);
        $word       = self::randomWord($array, $request->session()->get('player_id'));
        return $word;
    }

    public static function randomWord($array, $playerId)
    {
        $rand   = array_rand($array);
        $unique =  $array[$rand];
        $dataResult = ResultTrait::resultByPlayer($playerId, $unique);
        if($dataResult){
            $unique = self::randomWord($array, $playerId);
        }

        return [
            'original_word' => $unique,
            'scramble_word' => str_shuffle($unique)
        ];
    }
}
