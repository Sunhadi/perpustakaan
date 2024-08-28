@extends('layouts.index')
@section('title', 'Kembalikan Buku')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">List Buku Di Pinjam</h5>
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
            <th>Tanggal Wajib Kembalikan</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         @forelse ($giveback as $item)
             <tr>
             
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->nama_lengkap}}</td>
                <td>{{$item->buku->judul}}</td>
                <td>{{$item->tanggal_wajib_pengembalian}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/kembalikan-save/{{$item->id}}" class="btn btn-primary btn-sm">Kembalikan</a></td>
             
             </tr>
         @empty
             <tr>
                <td colspan="5"><p class="text-danger">Buku Di Pinjam Kosong</p></td>
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