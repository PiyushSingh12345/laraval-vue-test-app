@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <h2>Click on the link given below</h2>
        <div class="list-group">
            <a href="{{route('teams')}}" class="list-group-item list-group-item-action">Teams List</a>
            <a href="{{route('players')}}" class="list-group-item list-group-item-action">All Players List</a>
        </div>
    </div>
  </div>
</div>
@endsection
