@extends('backend.master')

@section('main-section')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="row">
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm rounded-0 shadow-none">Add Product</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Current Price</th>
                                <th>Privious Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @php
                                $x = 1;
                            @endphp
                            @if(count($products) > 0)
                                
                            @foreach ($products as $productItem)
                                <tr>
                                    <td>{{$x++}}</td>
                                    <td>{{$productItem->product_name}}</td>
                                    <td>
                                        <img src="{{asset('uploads/products/'.$productItem->product_image)}}" width="60" alt="Product Image">
                                    </td>
                                    <td>{{$productItem->current_price}}</td>
                                    <td>{{$productItem->prev_price}}</td>
                                    <td>
                                        @if ($productItem->status == 1)
                                            <a href="{{route('product.atoi',$productItem->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-user-check"></i></a>
                                            @else
                                            <a href="{{route('product.itoa',$productItem->id)}}" class="btn btn-sm btn-danger"><i class="fa-solid fa-user-xmark"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product.edit',$productItem->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{route('product.delete',$productItem->id)}}" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr class="text-center">
                                    <td class="text-danger fw-bold" colspan="7">Data Not Found</td>
                                </tr>
                            @endif
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
