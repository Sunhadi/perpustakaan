<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RentPermController extends Controller
{
    public function index(){
        $list_ajuan = Peminjaman::where('status', 'menunggu')->get();
        return view('admin.rent.index', compact('list_ajuan'));
    }

    public function izinkan($id){
        
        $izinkan = Peminjaman::find($id)->update([
            'status' => 'dipinjam',
        ]);
        return redirect('/list-pengajuan')->with('success', 'Buku berhasil di izinkan pinjam');
    }
    public function tolak($id){
        
        $tolak = Peminjaman::find($id)->update([
            'status' => 'ditolak',
        ]);
        return redirect('/list-pengajuan')->with('success', 'Pengajuan di tolak');
    }
    
    public function create(){

        $users = User::where('role_id', '!=', 1)->where('role_id', '!=', 2)->get();
        $books = Buku::all();
        return view('admin.rent.create', compact('users', 'books'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required'
        ]);

        $simpan = Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->book_id,
            'status' => 'dipinjam',
            'tanggal_peminjaman' => now()->format('Y-m-d')
        ]);

        return redirect('/kembalikan-buku')->with('success', 'Berhasil di pinjamkan');
    }
}
