@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="120">Role</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users ?? [] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
