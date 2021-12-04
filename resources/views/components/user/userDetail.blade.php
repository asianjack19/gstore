
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/userDetail.css') }}">    
@endpush
@extends('layouts.app')


@section('content')

<div  iv class="container d-flex justify-content-center flex-wrap">
  
  @guest
  <div class="card mb-3">
    <div class=" d-flex justify-content-center">
      <img class="card-img-top" src="{{ asset('storage/'.$user->photo) }}" alt="Card image cap">
    </div>
    <div class="card-body">
      <h5 class="card-title">Name: {{$user->name}}</h5>
      <p class="card-text">Email: {{$user->email}}</p>
      <p class="card-text"><small class="text-muted">Address: {{$user->address}}</small></p>
      <p class="card-text"><small class="text-muted">Phone: {{$user->phone}}</small></p>
    </div>
  </div>     
  @else
      @if ($user->id == Auth::user()->id )
      <div class="card d-flex flex-row">
        <div class=" d-flex justify-content-center">
          <img class="card-img-top" src="{{ asset('storage/'.$user->photo) }}" alt="Card image cap">
        </div>
        <div class="card-body d-flex flex-column justify-content-center">
          <h5 class="card-title">Name: {{$user->name}}</h5>
          <p class="card-text">Email: {{$user->email}}</p>
          <p class="card-text"><small class="text-muted">Address: {{$user->address}}</small></p>
          <p class="card-text"><small class="text-muted">Phone: {{$user->phone}}</small></p>
          <a href="{{ url('users/profile/?q='.Crypt::encrypt($user->id)); }}" class="btn btn-primary">Edit Profile</a>
        </div>
      </div>
      @else
      <div class="card mb-3">
        <div class=" d-flex justify-content-center">
          <img class="card-img-top" src="{{ asset('storage/'.$user->photo) }}" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Name: {{$user->name}}</h5>
          <p class="card-text">Email: {{$user->email}}</p>
          <p class="card-text"><small class="text-muted">Address: {{$user->address}}</small></p>
          <p class="card-text"><small class="text-muted">Phone: {{$user->phone}}</small></p>
        </div>
      </div>     
      @endif
  @endguest
</div>
@endsection