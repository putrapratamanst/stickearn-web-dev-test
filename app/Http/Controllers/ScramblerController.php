<?php

namespace App\Http\Controllers;

use App\Repository\ScoreRepository;
use Illuminate\Http\Request;

class ScramblerController extends Controller
{
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
}
