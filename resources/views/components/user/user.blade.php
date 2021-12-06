{{-- push user css --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/user.css') }}">
    
@endpush
@extends('layouts.app')


@section('content')
<h2 class="text-center text-light pt-4">Our Users</h2>
<div class="container d-flex justify-content-center" id="mainWrapper">
    <div class="container d-flex flex-wrap justify-content-lg-start">
    @forelse ($users as $user)
    <div class="card mt-5 d-flex ">
        <a href="{{url('/users/details').'?q='.Crypt::encrypt($user->id); }}">    
        <div class="d-flex justify-content-center">
            <img class="card-img-top" src="{{asset('storage/users/'.$user->photo)}}" alt="">
        </div>
        <div>
          <h3>{{$user->name}}</h3>
          <p>{{$user->email}}</p>
        </div>
    </a>
    </div>
    
    @empty
    <div class="align-middle mt-5">
        <h1 class="card-title  text-danger">Nothing to see!</h1>
        <h1 class="card-title  text-danger">(yet)<h1 class=" text-danger">&#x1F610;</h1></h1>
    </div>
    @endforelse

</div>
</div>
<div class="container" style="margin-top: 2rem">
    {{$users->links('pagination::bootstrap-4')}}
</div>
@endsection