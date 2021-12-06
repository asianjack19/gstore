@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/productDetail.css') }}">
@endpush
@extends('layouts.app')

@section('content')
<div  iv class="container d-flex justify-content-center flex-wrap">
  @guest
  <div class="card d-flex flex-row">
    <div class=" d-flex justify-content-center">
      <img class="card-img-top" src="{{asset('storage/products/'.$product->picture)}}" alt="Card image cap">
    </div>
    <div class="card-body d-flex flex-column justify-content-center">
      <h3 class="card-title">{{$product->name}}</h3>
      <p class="card-text">By <a href="{{url('/users/details').'?q='.Crypt::encrypt($product->owner_id); }}"><u>{{$product->owner_name}}</u></a></p>
      <p class="card-text">Stock Available: {{$product->stock}}</p>
      <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
      <p class="card-text">Category: {{$product->category_name}}</p>
      <p class="card-text" id="productDesc">{{$product->description}}</p>
      <a href="{{ url('/login') }}"  class="btn btn-primary">Purchase</a>
    </div>
  </div>
  @else
  @if ($product->owner_id == Auth::user()->id )
  <div class="card d-flex flex-row">
    <div class=" d-flex justify-content-center">
      <img class="card-img-top" src="{{ asset('storage/products/'.$product->picture) }}" alt="Card image cap">
    </div>
    <div class="card-body d-flex flex-column justify-content-center">
      <h3 class="card-title">{{$product->name}}</h3>
      <p class="card-text">By <a href="{{url('/users/details').'?q='.Crypt::encrypt($product->owner_id); }}"><u>{{$product->owner_name}}</u></a></p>
      <p class="card-text">Stock Available: {{$product->stock}}</p>
      <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
      <p class="card-text">Category: {{$product->category_name}}</p>
      <p class="card-text" id="productDesc">{{$product->description}}</p>
      <a href="{{url('/products/edit/?q=').Crypt::encrypt($product->id); }}" class="btn btn-success mb-4">Edit Product Instead</a>
      <a href="#"  class="btn btn-primary disabled" aria-disabled="true">Its your own product, duh! 😒</a>
    </div>
  </div>
@else
    <div class="card d-flex flex-row">
    <div class=" d-flex justify-content-center">
        <img class="card-img-top" src="{{ asset('storage/products/'.$product->picture) }}" alt="Card image cap">
    </div>
    <div class="card-body d-flex flex-column justify-content-center">
        <h3 class="card-title">{{$product->name}}</h3>
        <p class="card-text">By <a href="{{url('/users/details').'?q='.Crypt::encrypt($product->owner_id); }}"><u>{{$product->owner_name}}</u></a></p>
        <p class="card-text">Stock Available: {{$product->stock}}</p>
        <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
        <p class="card-text">Category: {{$product->category_name}}</p>
        <p class="card-text" id="productDesc">{{$product->description}}</p>
        <a href="{{ url('orders/create/?q='.Crypt::encrypt(Auth::user()->id).'&product='.Crypt::encrypt($product->id)); }}" class="btn btn-primary">Purchase</a>
    </div>
    </div>
    @endif    
 @endguest
 

</div>
@endsection