@extends('layouts.index')
@section('title', 'Laporan Peminjam')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">Laporan Peminjaman</h5>
        </div>
        <div>
            <a href="#" class="btn btn-dark btn-sm">Excel Export</a>
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
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         @forelse ($peminjaman as $item)
             <tr>
             
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->username}}</td>
                <td>{{$item->buku->judul}}</td>
                <td>{{$item->tanggal_peminjaman}}</td>
                <td>{{$item->tanggal_pengembalian}}</td>
                <td>{{Str::ucfirst($item->status)}}</td>

             
             </tr>
         @empty
             <tr>
                <td colspan="5"><p class="text-danger text-center">Laporan kosong</p></td>
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