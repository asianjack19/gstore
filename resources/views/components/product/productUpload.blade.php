@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/productUpload.css') }}">
@endpush
@extends('layouts.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="col-md-6 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="card-body d-flex flex-column justify-content-center">
                    <form method="POST" action="{{url('/products/upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name"class="col-md-4 col-form-label text-md-right">Product Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right" >Categories</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach  
                                </select>
            
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right" >Stock</label>
                            <div class="col-md-6">
                                <div>
                                    <p class="text-warning ">*use arrow button to be precise</p>
                                    <Input @error('stock') is-invalid @enderror name="stock"  autofocus class="range" type="range" name="stock" value="0" min="1" max="10000" onChange="rangeSlideStock(this.value)" onmousemove="rangeSlideStock(this.value)"></Input>
                                    <span id="rangeValueStock">0</span> Piece(s)
                                </div>
            
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right" >Price</label>
                            <div class="col-md-6">
                                <div>
                                    <p class="text-warning ">*use arrow button to be precise</p>
                                    <Input @error('price') is-invalid @enderror name="price"  autofocus class="range" type="range" name="price" value="0" min="5000" max="999999" step="500" onChange="rangeSlidePrice(this.value)" onmousemove="rangeSlidePrice(this.value)"></Input>
                                    Rp <span id="rangeValuePrice">0</span>,-
                                </div>
            
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right" >Description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>
                            <div class="col-md-6">
                                <input id="picture" type="file" class="@error('picture') is-invalid @enderror" name="picture" autocomplete="picture" autofocus/>
                                @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Upload Product</button>
                                <a href="{{url('/products') }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
          
        </div>
      </div>
</div>
@endsection
<script type="text/javascript">
    function rangeSlidePrice(value) {
        document.getElementById('rangeValuePrice').innerHTML = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function rangeSlideStock(value) {
        document.getElementById('rangeValueStock').innerHTML = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>