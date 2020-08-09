<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamController extends Controller
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
        return view('teams.team');
    }

}
