@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      
      <form method="POST" action="players">
        @csrf
  
        <div class="form-group row">
            <label for="first_name" class="col-md-2 col-form-label">First Name</label>
            <div class="col-md-4">
                <input id="first_name" type="text" class="form-control" name="first_name" value="" required>
            </div>
            <label for="last_name" class="col-md-2 col-form-label">Last Name</label>
            <div class="col-md-4">
                <input id="last_name" type="text" class="form-control" name="last_name" value="" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="team_id" class="col-md-2 col-form-label">Select Team</label>
            <div class="col-md-7">
                <select class="form-control" id="team_id" name="team_id" required>
                    <option value>Select from here</option>
                    @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary btn-block">
                  Add Player
              </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row justify-content-center border-top pt-5">
    <div class="col-md-8">
      <h3>Player List</h3>
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>S. No.</th>
              <th>Player First Name</th>
              <th>Player Last Name</th>
              <th>Team Id</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($players as $i =>$player) 
            <tr>
            <td>{{ $i+1 }} </td>
              <td>{{ $player->first_name }}</td>
              <td>{{ $player->last_name }}</td>
            <td>{{$player->team_id}}</td>
            <td><a href="playeredit/{{$player->id}}" class="btn btn-info btn-sm">Edit</a></td>
              <td><a href="playerdelete/{{$player->id}}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection