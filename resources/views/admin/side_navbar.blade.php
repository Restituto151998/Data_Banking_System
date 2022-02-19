@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-link" href="{{  route('admin.dashboard') }}">
            {{ __('Dashboard') }}
        </a>
    </div>
    <div class="row">
        <a class="btn btn-link" href="{{  route('admin.profile') }}">
            {{ __('Profile') }}
        </a>
    </div>
    <div class="row">
        <a class="btn btn-link" href="{{ route('admin.add_resort') }}">
            {{ __('Add Resort') }}
        </a>
    </div>
    <div class="row">
        <a class="btn btn-link" href="{{ route('admin.add_user') }}">
            {{ __('Add User') }}
        </a>
    </div>
    <div class="row">
        <a class="btn btn-link" href="{{ route('admin.resort_list') }}">
            {{ __('Resort List') }}
        </a>
    </div>
</div>
@endsection