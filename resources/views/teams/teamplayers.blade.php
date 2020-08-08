@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center border-top pt-5">
    <div class="col-md-8">
    <h3>Players of team "<b>{{$teams->name}}</b>"</h3>
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>S. No.</th>
              <th>Player First Name</th>
              <th>Player Last Name</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tplayers as $i =>$tplayer) 
            <tr>
            <td>{{ $i+1 }} </td>
              <td>{{ $tplayer->first_name }}</td>
              <td>{{ $tplayer->last_name }}</td>
            <td><a href="/playeredit/{{$tplayer->id}}" class="btn btn-info btn-sm">Edit</a></td>
              <td><a href="/playerdelete/{{$tplayer->id}}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection