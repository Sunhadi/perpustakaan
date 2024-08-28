@extends('layouts.index')
@section('title', 'List users')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">List User</h5>
        </div>
        <div>
            <a href="/user-tambah" class="btn btn-dark btn-sm">Tambah User</a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Jadikan Petugas</th>
            <th>Action</th>  
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->role->name}}</td>
            <td>
            @if ($item->role_id == 2)
            <a href="/user-down/{{$item->id}}" class="btn btn-primary btn-sm">Jadikan Peminjam</a>
            @elseif ($item->role_id == 3)
            <a href="/user-acc/{{$item->id}}" class="btn btn-danger btn-sm">Jadikan Petugas</a>
            @endif
          </td>
            
            <td>
                
                <form action="/category-hapus" method="post">
                    @csrf
                    @method('delete')
                    <a href="/category-edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @if (Session::has('success'))
    <div class="bs-toast toast fade show bg-success bottom-0 end-0 position-fixed m-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Berhasil</div>
          <small>sec ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
         {{Session::get('success')}}
        </div>
      </div>
    @endif
@endsection