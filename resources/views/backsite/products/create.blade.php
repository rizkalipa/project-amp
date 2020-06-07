@extends('layouts.master')

@section('title', 'Create New Product')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Create a New Product</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('product.store') }}" class="w-75" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name">
            @error('name') <small class="text-danger">{{ $errors->first('name') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description">
            @error('description') <small class="text-danger">{{ $errors->first('description') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Initial Stock</label>
            <input type="number" class="form-control" name="total_stock">
            @error('total_stock') <small class="text-danger">{{ $errors->first('total_stock') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Nett Price</label>
            <input type="number" class="form-control" name="price">
            @error('price') <small class="text-danger">{{ $errors->first('price') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Available In</label>
            <input type="datetime" class="form-control" name="available-in">
            @error('available-in') <small class="text-danger">{{ $errors->first('available-in') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Product Image</label><br>
            <input type="file" name="image"><br>
            @error('image') <small class="text-danger">{{ $errors->first('image') }}</small> @enderror
        </div><br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection