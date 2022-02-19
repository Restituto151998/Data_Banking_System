@extends('layouts.app')

@section('content')
<div class="card-header text-center font-weight-bold">
      <h2>Resort List </h2>
    </div>
<div class="container">
@foreach($resort_lists as $resort)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Resort Name</th>
      <th scope="col">Assigned Staff</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $resort->resort_name }}</td>
      <td>{{ $resort->assigned_staff }}</td>
      <td>{{ $resort->status }}</td>
    </tr>
  </tbody>
</table>
     
@endforeach
</div>
@endsection