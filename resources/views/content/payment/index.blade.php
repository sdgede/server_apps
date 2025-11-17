@extends('adminlte::page')

@section('title', 'Payment Methods')

@section('content_header')
    <h1>Payment Methods</h1>
@stop

@section('content')

<a href="{{ route('payment.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Add Payment Method
</a>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Method Name</th>
                    <th>Account No</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
               @forelse($methods as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->code }}</td>
                    <td>
                        <a href="{{ route('payment.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('payment.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No data found</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@stop
