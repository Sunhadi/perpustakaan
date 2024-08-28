@extends('layouts.index')
@section('title', 'List Koleksiku')
@section('content')
    <div class="card">
        <div class="d-flex justify-content-between card-header">
            <div>
                <h5 class="">List Koleksi</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Category Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($bukus as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book->judul}}</td>
                            <td>@foreach ($item->book->category as $datass)
                                {{ $datass->nama_kategori}}
                            @endforeach</td>
                            <td>
                                
                                <form action="/hapus-koleksi" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="pinjam-buku/{{$item->book->id}}" class="btn btn-primary btn-sm">Pinjam</a>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus Koleksi</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6"><p class="text-danger text-center">Tidak ada yang di koleksi</p></td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="bs-toast toast fade show bg-success bottom-0 end-0 position-fixed m-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Berhasil</div>
                <small>sec ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
@endsection
