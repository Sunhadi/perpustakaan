@extends('layouts.index')
@section('title', 'Home Page')
@section('search')
<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <form action="/home" method="post">
        @csrf
        <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
        name="nama_buku"
      />
      </form>
    </div>
  </div>
@endsection
@section('content')
    <div class="row">
        @forelse ($book as $item)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/book-detail/{{$item->id}}">{{ $item->judul }}</a></h5>
                        <h6 class="card-subtitle text-muted">
                            @foreach ($item->category as $datass)
                                {{$datass->nama_kategori}}
                            @endforeach
                        </h6>
                        <img class="img-fluid d-flex mx-auto my-4" src="{{ asset('storage/cover/' . $item->image) }}"
                            alt="Card image cap">
               
                        @if (Auth::user())
                            @if (Auth::user()->role_id != 3)
                            @else
                            <a href="/pinjam-buku/{{$item->id}}" class="card-link">Pinjam</a>
                            <a href="/simpan-koleksi/{{$item->id}}" class="card-link">Tambah koleksi</a>
                            @endif
                        @else
                            <a href="/login" class="card-link">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>
@endsection
