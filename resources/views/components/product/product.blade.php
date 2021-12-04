{{-- push user css --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/product.css') }}">
@endpush
@extends('layouts.app')


@section('content')
<h2 class="text-center text-light pt-4">Our Products</h2>
<div id="buttonUpload">
    <a class="btn btn-primary"href="/insert">Upload Product</a>
</div>
<div class="container d-flex justify-content-center" id="mainWrapper">
    <div class="container d-flex flex-wrap justify-content-lg-start">
    @forelse ($products as $product)
    <div class="card mt-5 ">
        <img class="card-img-top" src="{{asset('storage/'.$product->picture)}}" alt="">
        <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <p class="card-text">By <a href="{{url('/users/details').'?q='.Crypt::encrypt($product->owner_id); }}"><u>{{$product->owner_name}}</u></a></p>
            <p class="card-text">Stock Available: {{$product->stock}}</p>
            <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
            <p class="card-text">Category: {{$product->category_name}}</p>
            <a href="{{url('/products/details').'?q='.Crypt::encrypt($product->id); }}" class="btn btn-warning">Learn More</a>
        </div>
    </div>
    @empty
    <div class="align-middle mt-5">
        <h1 class="card-title  text-danger">Nothing to see!</h1>
        <h1 class="card-title  text-danger">(yet)<h1 class=" text-danger">&#x1F610;</h1></h1>
    </div>
    @endforelse

</div>
</div>

@endsection