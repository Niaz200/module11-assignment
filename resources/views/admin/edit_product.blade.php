@extends('admin.layouts.template')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Product</h5>
                <small class="text-muted float-end">Default label</small>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message')}}

                    </div>

                @endif    
            </div>
            <div class="card-body">
                <form action="{{url('/update-product/'.$prod->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $prod->name }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" value="{{ $prod->price }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $prod->quantity }}"  />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="product_img" name="product_img"/>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Basic with Icons -->
</div>

@endsection