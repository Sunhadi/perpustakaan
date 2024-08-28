@extends('layouts.index')
@section('title', 'List Buku')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div>
            <h5 class="">List Buku</h5>
        </div>
        <div>
            <a href="/buku-tambah" class="btn btn-dark btn-sm">Tambah Buku</a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Cover Buku</th>
            <th>Category</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Action</th>  
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($buku as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->judul}}</td>
            <td><img src="{{asset('storage/cover/'. $item->image)}}" alt="image" width="100"></td>
            <td>
              @foreach ($item->category as $datass)
                  {{$datass->nama_kategori}}
              @endforeach
            </td>
            <td>{{$item->penulis}}</td>
            <td>{{$item->penerbit}}</td>
            <td>
                
                <form action="/buku-hapus" method="post">
                    @csrf
                    @method('delete')
                    <a href="/buku-edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
          </tr>
          @empty
              <tr>
                <td colspan="6"><p class="text-danger text-center">Data tidak ada</p></td>
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