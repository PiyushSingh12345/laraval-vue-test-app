<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Resources\PlayerCollection;
use App\Player;
use App\Http\Resources\Team as TeamResource;
use App\Http\Resources\TeamCollection;
use App\Team;
use App\Http\Requests;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeamResource(Player::all()->sortByDesc('id'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'team_id' => 'required',
        ]);
        $players = new Player();
        $players->first_name = $request->first_name;
        $players->last_name = $request->last_name;
        $players->team_id = $request->team_id;
        $players->save();
        return new TeamResource($players);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TeamResource(Player::FindOrFail($id));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'team_id' => 'required',
        ]);
        $players = Player::find($id);
        $players->first_name = $request->first_name;
        $players->last_name = $request->last_name;
        $players->team_id = $request->team_id;
        $players->save();
        return new TeamResource($players);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $players = Player::findOrFail($id);
        $players->delete();
        
        return new TeamResource($players);
    }
}
