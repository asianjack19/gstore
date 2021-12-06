@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/updateProfile.css') }}">
@endpush
@extends('layouts.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="col-md-6 grid-margin stretch-card mt-5">
        <div class="card mb-4">
          <div class="card-body">
            <h4 class="card-title">Update Profile for <i>{{strtoupper($user->name)}}</i></h4>
            <form class="forms-sample" method="POST" action="{{url('users/profile/'.Crypt::encrypt($user->id))}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address}}" required autocomplete="address" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone}}" required autocomplete="phone" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="col-md-4 col-form-label text-md-right">Picture</label>
                    <div class="col-md-6">
                        <input id="photo" type="file" class="@error('photo') is-invalid @enderror" name="photo" autocomplete="photo" autofocus/>                        
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <h4 class="mt-3">Current Profile Picture</h4>
                <img src="{{asset('storage/users/'.$user->photo)}}" alt="" class="img-thumbnail">
              <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                  <a href="{{url('/users/details').'?q='.Crypt::encrypt($user->id); }}" class="btn btn-dark">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection