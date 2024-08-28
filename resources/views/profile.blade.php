@extends('layouts.index')
@section('title', 'Home Page')
@section('content')
<div class="row">
    <div class="col-md-12">
      
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <form action="/user-update"  method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="
            @if ($user->foto == null)
                {{asset('sbadmin/assets/img/avatars/1.png')}}
            @else
                {{asset('storage/profile/'. $user->foto)}}
            @endif
            " alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload foto baru</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden="" name="image">
              </label>
              <p class="text-muted mb-0">Diperbolehkan JPG, GIF atau PNG. Ukuran maksimum 1MB</p>
            </div>
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Username</label>
                <input class="form-control" type="text" id="firstName" name="username" value="{{$user->username}}" autofocus="">
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" id="firstName" name="nama_lengkap" value="{{$user->nama_lengkap}}" autofocus="">
              </div>
              <div class="mb-3 col-md-12">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" >
                <input class="form-control" type="hidden" id="email" name="id" value="{{$user->id}}" >
              </div>
              <div class="mb-3 col-md-12">
                <label for="email" class="form-label">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{$user->alamat}}</textarea>
              </div>
              
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Simpan</button>
              <button type="reset" class="btn btn-outline-secondary">Batal</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h5 class="card-header">Hapus Akun</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form action="/delete-user" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
