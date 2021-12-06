@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/updateBalance.css') }}">
@endpush
@extends('layouts.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="col-md-6 grid-margin stretch-card mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Balance for <i>{{strtoupper($user->name)}}</i></h4>
            <img src="{{asset('storage/users/'.$user->photo)}}" alt="user" class=" rounded mx-auto d-block w-25">
            <form class="forms-sample" method="POST" action="{{url('users/topup/'.Crypt::encrypt($user->id))}}">
                @csrf
                <div class="form-group">
                    <label for="balance" class="col-md-4 col-form-label text-md-right">Current Balance: <br>Rp {{number_format( $user->balance , 0 , '.' , ',' );}},-</label>
                    <input id="balance" type="number" class="form-control @error('balance') is-invalid @enderror" name="balance" required autocomplete="balance" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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