@extends('layouts.app')

@section('content')
<div class="container w-75 mt-5">
    <div class="d-flex flex-row justify-content-evenly">
        <div class="card mt-5 w-50">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$countUser}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Users
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 w-25">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$countProduct}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Products
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="d-flex flex-row justify-content-evenly">
        <div class="card mt-5 w-25">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$countCategory}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Categories 
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 w-50">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$countOrder}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Orders
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>  
    </div>
   
</div>
@endsection
