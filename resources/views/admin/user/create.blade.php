@extends('layouts.index')
@section('title', 'Tambah user')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah User</h5>
                <div class="card-body">
                    <form action="/user" method="post">
                        @csrf
                        <div class="mt-4">
                            <label for="defaultFormControlInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" "
                                aria-describedby="defaultFormControlHelp" name="username">
                            @error('username')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="defaultFormControlInput" class="form-label">Nama lengkap</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" "
                                aria-describedby="defaultFormControlHelp" name="nama_lengkap">
                            @error('nama_lengkap')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" 
                                aria-describedby="defaultFormControlHelp" name="email">
                            @error('email')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="defaultFormControlInput" class="form-label">Password</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" 
                                aria-describedby="defaultFormControlHelp" name="password">
                            @error('password')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="defaultFormControlInput" class="form-label">Role</label>
                            <select name="role_id" id="" class="form-select">
                                @foreach ($role as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
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
