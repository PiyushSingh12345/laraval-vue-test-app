@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>Edit Team </h3>
      
      <form method="POST" action="/teamedit/{{$teams->id}}">
        @csrf
        @method('PUT')
        
        <div class="form-group row">
            <label for="team_name" class="col-md-4 col-form-label">Team Name</label>
            <div class="col-md-6">
            <input id="team_name" type="text" class="form-control" name="team_name" value="{{$teams->name}}" required>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                  Edit Team
              </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection