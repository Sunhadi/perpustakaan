@extends('layouts.index')
@section('title', 'List Ajuan Peminjam')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">List Pengajuan Pinjaman</h5>
        </div>
        <div>
            <a href="/tambah-pinjaman" class="btn btn-dark btn-sm">Tambah Pinjaman</a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama username</th>
            <th>Judul Buku</th>  
            <th>Tanggal Ajuan Peminjaman</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         @forelse ($list_ajuan as $item)
             <tr>
             
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->username}}</td>
                <td>{{$item->buku->judul}}</td>
                <td>{{$item->tanggal_peminjaman}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/izinkan-pinjam/{{$item->id}}" class="btn btn-primary btn-sm">Izinkan Pinjam</a>  <a href="" class="btn btn-danger btn-sm">Tolak Pinjaman</a></td>
             
             </tr>
         @empty
             <tr>
                <td colspan="5"><p class="text-danger">Ajuan pinjam kosong</p></td>
             </tr>
         @endforelse
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