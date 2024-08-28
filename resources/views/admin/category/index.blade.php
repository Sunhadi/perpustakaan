@extends('layouts.index')
@section('title', 'Category')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">List Category</h5>
        </div>
        <div>
            <a href="/category-tambah" class="btn btn-dark btn-sm">Tambah Kategori</a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Action</th>  
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($kategori as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama_kategori}}</td>
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