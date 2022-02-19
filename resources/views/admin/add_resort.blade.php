@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <title>Add Resort</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
 
<div class="container mt-5">
 
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
  <div class="card">
 
    <div class="card-header text-center font-weight-bold">
      <h2>Add Resort</h2>
    </div>
 
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" id="add_resort" action="{{ url('add_resort') }}" >
        @csrf
            <div class="row">
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="formGroupExampleInput" name="resort_name" placeholder="Resort Name">
                        <label for="formGroupExampleInput">Resort Name</label>
                    </div>
                </div>
 
                <div class="row mt-5">
                <div class="form-group">
                <label for="formGroupExampleInput">Description</label>
              <textarea name="resort_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> 
                       </div>
                </div>
                   
                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
    </div>
  </div>
</div>  
</body>
</html>
@endsection