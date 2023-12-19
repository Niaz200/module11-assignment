@extends('admin.layouts.template')
@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
  <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title btn btn-danger">Today Sales</h5>
        <p class="card-text">{{$today}}tk</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title btn btn-primary">Yesterday Sales</h5>
        <p class="card-text">{{$yeasterday}}tk</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title btn btn-success">This Month Sales</h5>
        <p class="card-text">{{$thismonth}}tk</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title btn btn-warning">Last Month Sales</h5>
        <p class="card-text">{{$lastmonth}}tk</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
</div>
</div>
@endsection