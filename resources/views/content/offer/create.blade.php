@extends('adminlte::page')

@section('title', 'Create Offer')

@section('content_header')
    <h1>Create New Offer</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('offer.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Offer Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label>Offer Description</label>
                <textarea class="form-control" rows="4" name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Discount (%)</label>
                <input type="number" class="form-control" name="discount" required>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-check"></i> Save Offer
            </button>
        </form>

    </div>
</div>
@stop
