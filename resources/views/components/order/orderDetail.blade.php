
@push('styles')
<link rel="stylesheet" href="{{ asset('css/gstore/orderDetail.css') }}">    
@endpush
@extends('layouts.app')

@section('content')
<div  iv class="container d-flex justify-content-center flex-wrap">
  @if (Auth::user()->id )
  <div class="card d-flex flex-row">
    <div class=" d-flex flex-column justify-content-center">
      <img class="card-img-top" src="{{ asset('storage/products/'.$product->picture) }}" alt="Card image cap">
      <b><h3 class="text-success">{{$product->name}}</h3></b>
    </div>
    <div class="card-body d-flex flex-column justify-content-center text-start">
      <p class="card-title text-warning">Quantity: {{$orderDetail[0]->quantity}}</p>
      <p class="card-title text-warning">Product Price: {{$product->price}}</p>
      <p class="card-title text-warning">Order: {{$order->amount}}</p>
      <h5 class="text-danger mt-4">Destination: {{$order->destination}}</h5>
    </div>
  </div>
  @endif
</div>
@endsection