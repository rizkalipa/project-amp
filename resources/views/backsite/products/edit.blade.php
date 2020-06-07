@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Edit Product : {{ $product->name }}</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('product.update') }}" class="w-75" enctype="multipart/form-data" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            @error('name') <small class="text-danger">{{ $errors->first('name') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            @error('description') <small class="text-danger">{{ $errors->first('description') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Initial Stock</label>
            <input type="number" class="form-control" name="total_stock" value="{{ $product->total_stock }}">
            @error('total_stock') <small class="text-danger">{{ $errors->first('total_stock') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Nett Price</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
            @error('price') <small class="text-danger">{{ $errors->first('price') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Available In</label>
            <input type="datetime" class="form-control" name="available-in" value="{{ $product->available_in }}">
            @error('available-in') <small class="text-danger">{{ $errors->first('available-in') }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Product Image</label><br>
            <input type="file" name="image" value="{{ $product->image }}"><br>
            @error('image') <small class="text-danger">{{ $errors->first('image') }}</small> @enderror
            <br>
            <img src="{{ $product->image }}" class="img w-50">
        </div><br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection