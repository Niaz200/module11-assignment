@extends('admin.layouts.template')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sales</h4>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message')}}

            </div>

        @endif 
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Availlable All Sales Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Product ID</th>
                        <th>Price</th>
                    
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($sale as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td></td>
                            <td>{{ $row->price }}</td>
                           
                            <td>
                                <!-- <a href="{{ route('editproduct', $row->id) }}" class="btn btn-primary">Edit</a> -->
                                <a href="{{ route('deletesale', $row->id) }}" class="btn btn-warning">Delete</a>


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