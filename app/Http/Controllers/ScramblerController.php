<?php

namespace App\Http\Controllers;

use App\Repository\PlayerRepository;
use App\Repository\ScoreRepository;
use App\Repository\ResultRepository;
use App\Traits\ScramblerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScramblerController extends Controller
{
    use ScramblerTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
}
