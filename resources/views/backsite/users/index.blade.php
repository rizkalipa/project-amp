@extends('layouts.master')

@section('title', 'User Management')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Registered User Data</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>User Level</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>User Level</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->role_id == 1 ? 'Customer' : 'Admin' }}</td>
                <td>
                  <a class="btn btn-sm" href=""><span class=""><i class="fas fa-edit text-primary"></i></span></a>
                  
                  <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-sm">
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