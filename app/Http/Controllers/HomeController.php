<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(Request $request){

        if ($request->nama_buku == null) {
            $book = Buku::with(['category'])->get();
        }else
        {
            $book = Buku::where('judul', 'LIKE' ,'%'. $request->nama_buku . '%')->with(['category'])->get();
        }

        return view('home', compact('book'));
    }
  

    public function show($id){
        $book = Buku::find($id);
        $ulasans = Ulasan::with(['user'])->where('book_id', $id)->get();
        return view('book-detail', compact('book', 'ulasans'));
    }
}
