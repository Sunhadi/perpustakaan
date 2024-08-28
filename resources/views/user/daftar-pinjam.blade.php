@extends('layouts.index')
@section('title', 'Daftar Pinjamku')
@section('content')
    <div class="card">
        <div class="d-flex justify-content-between card-header">
            <div>
                <h5 class="">List Dipinjam</h5>
            </div>
            <div>
                <a href="/home" class="btn btn-dark btn-sm">Cari Buku</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Wajib Pengembalian</th>
                        <th>Status Pinjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Info</th>
                        
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($pinjaman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td><p class="text-primary">{{ $item->status }}</p></td>
                            <td>{{ $item->tanggal_peminjaman }}</td>
                            <td>{{ $item->tanggal_wajib_pengembalian }}</td>
                            
                            <td>
                                @if ($item->tanggal_pengembalian == null)
                                    <p>belum dikembalikan</p>
                                @else
                                    {{ $item->tanggal_pengembalian }}
                                @endif
                            </td>
                            <td>{{$item->tanggal_pengembalian}}</td>
                            <td>
                                @if ($item->status == 'menunggu')
                                <p class="text-primary">Menunggu di izinkan</p>
                                @elseif($item->status == 'dipinjam')
                                <p class="text-primary">Harap kembalikan buku kepada admin setelah selesai meminjam</p>
                                @elseif ($item->status == "selesai")
                                <p class="text-success">Selesai Di Pinjam</p>
                                @endif
                            </td>
                    
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6"><p class="text-danger text-center">Tidak Ada Yang Di Pinjam</p></td>
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
