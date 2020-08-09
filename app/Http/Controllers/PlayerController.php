<?php

use App\Http\Resources\Player as PlayerResource;
use App\Http\Resources\PlayerCollection;
namespace App\Http\Controllers;
use App\Player;
use App\Team;

use Illuminate\Http\Request;

class PlayerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('players.player');
    }

}
