@extends('layouts.index')
@section('title', 'Tambah Buku')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Kategori</h5>
                <div class="card-body">
                    <form action="/buku" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="defaultFormControlInput" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                                aria-describedby="defaultFormControlHelp" name="judul">
                            @error('judul')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="defaultFormControlInput" class="form-label">Judul Buku</label>
                            <input type="file" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                                aria-describedby="defaultFormControlHelp" name="cover">
                            @error('cover')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="defaultFormControlInput" class="form-label">Pilih Category</label>
                            <select class="form-select" name="category_id[]" multiple>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="defaultFormControlInput" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp" name="penulis">
                            @error('penulis')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="defaultFormControlInput" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp" name="penerbit">
                            @error('penerbit')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 col-lg-6">
                            <label for="defaultFormControlInput" class="form-label">Tahun terbit</label>
                            <input type="date" class="form-control" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp" name="tahun_terbit">
                            @error('tahun_terbit')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-sm" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
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
