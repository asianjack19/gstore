{{-- push user css --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gstore/orderList.css') }}">
@endpush
@extends('layouts.app')

@section('content')
<div class="mt-4 d-flex justify-content-center">
    <h3 class="text-warning">Orders Made</h3>
</div>
<table class="table table-borderless table-dark">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Username</th>
        <th scope="col">Amount</th>
        <th scope="col">Destination</th>
        <th scope="col">Created At</th>
        <th scope="col">Deleted At</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ordersMade as $order) )
        <tr>
            <th scope="row"><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$loop->iteration}}</a></th>
            <td><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$order->user_name}}</a></td>
            <td><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$order->amount}}</a></td>
            <td><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$order->destination}}</a></td>
            <td><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$order->created_at}}</a></td>
            <td><a href="{{url('/orders/details/?q='.Crypt::encrypt($order->id))}}">{{$order->updated_at}}</a></td>
            </tr>    
        @empty
        <tr>
            <td colspan="6" class="text-center">No orders made yet</td>      
        @endforelse
    </tbody>
</table>

<div class="mt-5 d-flex justify-content-center">
    <h3 class="text-warning">Orders Received</h3>
</div>
<table class="table table-borderless table-dark">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Username</th>
        <th scope="col">Amount</th>
        <th scope="col">Destination</th>
        <th scope="col">Created At</th>
        <th scope="col">Deleted At</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ordersReceived as $order) )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$order->user_name}}</td>
            <td>{{$order->amount}}</td>
            <td>{{$order->destination}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->updated_at}}</td>
            </tr>    
        @empty
        <tr>
            <td colspan="6" class="text-center">No orders made yet</td>      
        @endforelse
    </tbody>
</table>
@endsection 