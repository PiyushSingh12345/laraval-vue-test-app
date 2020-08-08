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
        $players = Player::all();
        $teams = Team::all();
        return view('players.player',['players'=>$players,'teams'=>$teams]);
    }

    public function createPlayer(Request $request) {
        // logic to create a Player record goes here
        
        $players = new Player();
        $players->first_name = $request->first_name;
        $players->last_name = $request->last_name;
        $players->team_id = $request->team_id;
        $players->save();
        return redirect('players');
      }
  
      public function editPlayer($id) {
        // logic to go edit page
        $players = Player::find($id);
        $teams = Team::all();
        return view('players.edit',['players'=>$players,'teams'=>$teams]);
      }
  
      public function updatePlayer(Request $request, $id) {
        // logic to update a player record goes here
            
        $players = Player::find($id);
        $players->first_name = $request->first_name;
        $players->last_name = $request->last_name;
        $players->team_id = $request->team_id;
        $players->save();
        return redirect('players');
      }
  
      public function deletePlayer ($id) {
        
        $players = Player::find($id);
        $players->delete();
        return redirect('players');
      }
}
