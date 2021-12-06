
@push('styles')
<link rel="stylesheet" href="{{ asset('css/gstore/userDetail.css') }}">    
@endpush
@extends('layouts.app')


@section('content')

<div  iv class="container d-flex justify-content-center flex-wrap">


 

  @if ($user->id == Auth::user()->id )
  <div class="card d-flex flex-row">
    <div class=" d-flex justify-content-center">
      <img class="card-img-top" src="{{ asset('storage/users/'.$user->photo) }}" alt="Card image cap">
    </div>
    <div class="card-body d-flex flex-column justify-content-center">
      <h5 class="card-title">Name: {{$user->name}}</h5>
      <p class="card-text">Email: {{$user->email}}</p>
      <p class="card-text"><small class="text-muted">Address: {{$user->address}}</small></p>
      <p class="card-text"><small class="text-muted">Phone: {{$user->phone}}</small></p>
      <h4 class="card-text"><small class="text-success">Current Balance: Rp {{number_format( $user->balance , 0 , '.' , ',' );}},-</small></h4>
      <a href="{{ url('users/profile/?q='.Crypt::encrypt($user->id)); }}" class="btn btn-primary">Edit Profile</a>
      <a href="{{ url('users/topup?q='.Crypt::encrypt($user->id)); }}" class="btn btn-success mt-3">Topup Balance</a>
    </div>
  </div>
  @endif  

</div>
@endsection