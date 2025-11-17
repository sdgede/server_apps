@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Product List</h1>
@stop

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Add Product
</a>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="150">Stock</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products ?? [] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp {{ number_format($item->price) }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
