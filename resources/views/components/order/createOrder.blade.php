
@push('styles')
<link rel="stylesheet" href="{{ asset('css/gstore/createOrder.css') }}">    
@endpush
@extends('layouts.app')


@section('content')

<div  iv class="container d-flex justify-content-center flex-wrap">

  @if ($user->id == Auth::user()->id )
  <div class="card d-flex flex-row">
    <div class=" d-flex justify-content-center flex-column">
      <div class="d-flex justify-content-center">
        <img class="card-img-top w-75" src="{{ asset('storage/products/'.$product->picture) }}" alt="Card image cap">
      </div>
      <i><b><h3 class="text-success">{{$product->name}}</h3></b>  </i>
      <p class="text-danger">{{number_format( $product->price , 0 , '.' , ',' );}},- / piece</p>
      <p class="text-light">Available Stock: {{$product->stock}} pieces</p>  
    </div>
    <div class="card-body d-flex flex-column justify-content-center">
      <form class="forms-sample" method="POST" action="{{url('orders/create/'.Crypt::encrypt($product->id))}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <h5 class="text-warning mb-4">Choose Quantity</h5>
          <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"  min="1" name="quantity" required autocomplete="quantity" autofocus>
          @if (Session::has('message'))
            <p class="text-danger mt-2">{{ Session::get('message') }}</p>
          @endif
      </div>   
      <div class="mt-3">
          <button type="submit" class="btn btn-primary mr-2">Purchase</button>
          <a href="{{url('/products') }}" class="btn btn-dark">Cancel</a>
      </div>
    </form>
    </div>
  </div>
  @endif  

</div>
@endsection