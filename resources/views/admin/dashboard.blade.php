@extends('layouts.index')
@section('title', 'Dashboard')
@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
          </div>
          <span>Total Buku</span>
          <h3 class="card-title text-nowrap mb-1 text-primary">{{$total_buku}}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
          </div>
          <span>Total Category</span>
          <h3 class="card-title text-nowrap mb-1 text-primary">{{$total_categories}}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
          </div>
          <span>Total User</span>
          <h3 class="card-title text-nowrap mb-1 text-primary">{{$total_users}}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
          </div>
          <span>Total Sedang Di Pinjam</span>
          <h3 class="card-title text-nowrap mb-1 text-primary">{{$total_buku_dipinjam}}</h3>
        </div>
      </div>
    </div>
  </div>
  
    
@endsection