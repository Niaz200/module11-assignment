@extends('admin.layouts.template')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message')}}

            </div>

        @endif 
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Availlable All Product Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Img</th>
                        <th>Price</th>
                    
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($product as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td><img src="{{ asset($row->product_img) }}" style=" height: 60px; width: 60px;" alt=""></td>
                            <td>{{ $row->price }}</td>
                           
                            <td>
                                <a href="{{ route('editproduct', $row->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('deleteproduct', $row->id) }}" class="btn btn-warning">Delete</a>

                                <form action="{{ route('saleproduct') }}" method="POST" enctype="multipart/form-data">
                                
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <input type="hidden" name="name" value="{{ $row->name}}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{ $row->price }}">

                                    <button type="submit" class="btn btn-primary mt-1">Sales</button>
                                    
                                </form>
                                <!-- <a href="{{ route('deleteproduct', $row->id) }}" class="btn btn-success">Sales</a> -->

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->
</div>

@endsection