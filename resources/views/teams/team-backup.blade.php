@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      
      <form method="POST" action="teams">
        @csrf
  
        <div class="form-group row">
            <label for="team_name" class="col-md-4 col-form-label">Team Name</label>
            <div class="col-md-6">
                <input id="team_name" type="text" class="form-control" name="team_name" value="" required>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                  Add Team
              </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row justify-content-center border-top pt-5">
    <div class="col-md-8">
      <h3>Team List</h3>
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>S. No.</th>
              <th>Team Name</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teams as $i =>$team) 
            <tr>
            <td>{{ $i+1 }} </td>
              <td><a href="teamplayers/{{$team->id}}">{{ $team->name }}</a></td>
              <td><a href="teamedit/{{$team->id}}" class="btn btn-info btn-sm">Edit</a></td>
              <td><a href="teamdelete/{{$team->id}}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection