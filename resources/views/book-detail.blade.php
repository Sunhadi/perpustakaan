@extends('layouts.index')
@section('title', 'Home Page')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <h6 class="card-subtitle text-muted">
                      @foreach ($book->category as $datass)
                      {{ $datass->nama_kategori }},
                      @endforeach
                    </h6>
                    <img class="img-fluid d-flex mx-auto my-4" src="{{ asset('storage/cover/' . $book->image) }}"
                        alt="Card image cap">
                    
                    @if (Auth::user())
                        @if (Auth::user()->role_id != 3))
                        @else
                        <a href="/pinjam-buku/{{$book->id}}" class="card-link">Pinjam</a>
                        <a href="/simpan-koleksi/{{$book->id}}" class="card-link">Tambah koleksi</a>
                        @endif
                    @else
                        <a href="/login" class="card-link">Login</a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="mb-3">
           
            @if (Auth::user())
              @if (Auth::user()->role_id == 3)
              <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  Berikan Ulasan
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Berikan ulasanmu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/simpan-ulasan" method="post">
                          @csrf
                          <div class="modal-body">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Ulasanmu</label>
                                  <textarea name="ulasan" id="" cols="30" rows="3" class="form-control"></textarea>
                                 
                                </div>
                                
                              </div>
                              <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Rating 1-5</label>
                                <input type="number" id="nameWithTitle" class="form-control" placeholder="Enter Number" name="rating">
                                <input type="hidden" id="nameWithTitle" class="form-control" placeholder="Enter Number" name="id" value="{{$book->id}}">
                               
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endif
          </div>

        @foreach ($ulasans as $ulasan)
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white mb-3">
              <div class="card-header">{{ $ulasan->user->nama_lengkap}}</div>
              <div class="card-body">
                <h5 class="card-title text-white">Rating: {{ $ulasan->rating}}</h5>
                <p class="card-text">{{ $ulasan->ulasan}}</p>
              </div>
            </div>
          </div>
        @endforeach
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
