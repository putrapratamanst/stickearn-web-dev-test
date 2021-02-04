<?php

namespace App\Http\Controllers;

use App\Traits\PlayerTrait;

class HomeController extends Controller
{
    use PlayerTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lists = $this->getListPlayer();

        return view('/home', [
            'lists' => $lists
        ]);
    }
}
