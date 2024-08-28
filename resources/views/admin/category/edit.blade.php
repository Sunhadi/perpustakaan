@extends('layouts.index')
@section('title', 'Category')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card mb-4">
              <h5 class="card-header">Edit Kategori</h5>
              <div class="card-body">
                <form action="/category-update" method="post">
                    @csrf
                    @method('put')
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="defaultFormControlInput"  aria-describedby="defaultFormControlHelp" name="nama_kategori" value="{{$kategori->nama_kategori}}">
                        <input type="hidden" class="form-control" id="defaultFormControlInput"  aria-describedby="defaultFormControlHelp" name="id" value="{{$kategori->id}}">
                        @error('nama_kategori')
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