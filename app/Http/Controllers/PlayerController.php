<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Repository\PlayerRepository;
use App\Traits\PlayerTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    use PlayerTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function form()
    {
        return view('/player/form');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), Player::$rules);

        if ($validator->fails())
            return Redirect::to('/player/form')->withInput()->withErrors($validator);

        $dataPlayer = $this->detailByUsername($request->username);

        if ($dataPlayer) {
            $checkPlayer = $this->detailByUsernameAndPassword($request->username, $request->password);
            if (!$checkPlayer) {
                return view('/player/form')->withErrors(['', 'Data Player Not Found ']);
            }
        } else {
            $dataPlayer = $this->createPlayer($request);
        }

        $this->setSessionPlayer($dataPlayer);

        return redirect('/scrambler/playground');
    }
}
