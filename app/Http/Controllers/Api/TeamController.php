<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Team as TeamResource;
use App\Http\Resources\TeamCollection;
use App\Team;
use App\Http\Requests;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return new TeamResource(Team::all()->sortByDesc('id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'team_name' => 'required',
        ]);
        $teams = new Team();
        $teams->name = $request->team_name;
        $teams->save();
        return new TeamResource($teams);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TeamResource(Team::FindOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'team_name' => 'required',
        ]);
        $teams = Team::find($id);
        $teams->name = $request->team_name;
        $teams->save();

        return new TeamResource($teams);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams = Team::findOrFail($id);
        // $team->players()->delete();
        $teams->delete();
        
        return new TeamResource($teams);
    }
}
