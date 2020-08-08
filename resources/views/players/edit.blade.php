@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>Edit Player </h3>
      
      
      <form method="POST" action="/playeredit/{{$players->id}}">
        @csrf
        @method('PUT')
        
        <div class="form-group row">
          <label for="first_name" class="col-md-2 col-form-label">First Name</label>
          <div class="col-md-4">
              <input id="first_name" type="text" class="form-control" name="first_name" value="{{$players->first_name}}" required>
          </div>
          <label for="last_name" class="col-md-2 col-form-label">Last Name</label>
          <div class="col-md-4">
              <input id="last_name" type="text" class="form-control" name="last_name" value="{{$players->last_name}}" required>
          </div>
        </div>
        <div class="form-group row">
            <label for="team_id" class="col-md-2 col-form-label">Select Team</label>
            <div class="col-md-7">
                <select class="form-control" id="team_id" name="team_id" required>
                    <option value="">Select from here</option>
                    
                    @foreach ($teams as $team)
                        @if ($players['team_id']== $team->id)
                          <option value="{{$team->id}}" selected>{{$team->name}}</option>
                        @else
                          <option value="{{$team->id}}" >{{$team->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary btn-block">
                  Submit
              </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection