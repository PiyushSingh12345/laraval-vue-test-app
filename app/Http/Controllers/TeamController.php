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
        
        // $teams = Team::all();
        
        // return view('teams.team',['teams'=>$teams]);

        return view('teams.team');
    }

    public function teamdash() {
      return view('demotdashteamvue'); 
    }

    public function addteam() {
      return view('demotaddteamvue');   
    }


    public function teamPlayers($id) {
        //logic to get all players of a Teams goes here
        $teams = Team::find($id);
        $tplayers = Player::where('team_id','=',$id)->get();
        
        return view('teams.teamplayers',['tplayers'=>$tplayers,'teams'=>$teams]);
    }
  
      public function createTeam(Request $request) {
        // logic to create a Team record goes here
        
        $teams = new Team();
        $teams->name = $request->team_name;
        $teams->save();
        return redirect('teams');
      }
  
      public function editTeam($id) {
        // logic to go edit page
        $teams = Team::find($id);
        return view('teams.edit',['teams'=>$teams]);
      }
  
      public function updateTeam(Request $request, $id) {
        // logic to update a Team record goes here
        // echo "update";
        $teams = Team::find($id);
        $teams->name = $request->team_name;
        $teams->save();
        return redirect('teams');
      }
  
      public function deleteTeam ($id) {
        
        $teams = Team::find($id);
        $teams->delete();
        return redirect('teams');
      }
}
