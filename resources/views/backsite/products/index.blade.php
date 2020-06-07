@extends('layouts.master')

@section('title', 'Product Data')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Product Data on Demand</h6>
    </div>
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($products as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->total_stock }}</td>
                <td>{{ $data->price }}</td>
                <td>
                    <img src="{{ asset($data->image) }}" class="img-fluid w-50">
                </td>
                <td>
                    <a class="btn" href="{{ route('product.edit', ['product' => $data->id]) }}"><span class=""><i class="fas fa-edit text-primary"></i></span></a>
                    
                    <form action="{{ route('product.destroy') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <button type="submit" class="btn">
                        <span><i class="fas fa-trash text-danger"></i></span>
                      </button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection