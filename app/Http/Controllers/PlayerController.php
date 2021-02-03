<?php

namespace App\Http\Controllers;

class PlayerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function form()
    {
        return view('/player/form');
    }
}
