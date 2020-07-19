@extends('layouts.master')

@section('title', 'Transaction Data')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Transaction Data Customer</h6>
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
                <th>Product Name</th>
                <th>Qty.</th>
                <th>Total Price</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product Name</th>
                <th>Qty.</th>
                <th>Total Price</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($transactions as $data)
              @foreach($data->products as $product)
              <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->user->name }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $data->total_count }}</td>
                  <td>{{ number_format($data->total_price) }}</td>
                  <td width="250px">
                      <img src="{{ asset($product->image) }}" class="img-fluid w-25">
                  </td>
                  <td>{{ $data->created_at->format('d F Y') }}</td>
                  <td>
                      <button class="btn" href="{{ route('product.edit', ['product' => $data->id]) }}"><span class=""><i class="fas fa-edit text-primary"></i></span></
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
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection