{{-- push user css --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/categoryList.css') }}">
@endpush
@extends('layouts.app')


@section('content')
<div class="container d-flex justify-content-center">
    <ul class="list-group text-white">
        @foreach ($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-content-center">
            <div class="d-flex flex-row" > <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="45" height="45" id="folerImg"/>
                <div class="ml-2">
                    <h6 class="mb-0 text-warning">{{$category->name}}</h6>
                    <div class="about"> 
                        <br>
                        <p class="text-info">{{$category->description}}</p> 
                        <span>Created: {{$category->created_at}}</span>
                        <br>
                        <span>Updated: {{$category->updated_at}}</span> </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection 