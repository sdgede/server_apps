@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="font-weight-bold">Dashboard</h1>
@stop

@section('content')
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>120</h3>
                <p>Total Products</p>
            </div>
            <div class="icon"><i class="fas fa-box"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>540</h3>
                <p>Total Orders</p>
            </div>
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>75</h3>
                <p>Users</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp 12jt</h3>
                <p>Total Revenue</p>
            </div>
            <div class="icon"><i class="fas fa-money-bill"></i></div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sales Chart</h3>
    </div>
    <div class="card-body">
        <div style="height: 300px; background: #f8f9fa; border-radius: 8px;" class="d-flex justify-content-center align-items-center">
            <p class="text-muted">Chart placeholder</p>
        </div>
    </div>
</div>
@stop
