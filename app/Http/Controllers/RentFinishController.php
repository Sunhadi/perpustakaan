<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RentFinishController extends Controller
{
    public function index(){
        
        $giveback = Peminjaman::with(['buku', 'user'])->where('status' , 'dipinjam')->get();
        return view('admin.kembalikan.index', compact('giveback'));
    }

    public function update($id){
        $giveback = Peminjaman::find($id)->update([
            'status' => 'selesai',
            'tanggal_pengembalian' => now(),
        ]);

        return redirect('/kembalikan-buku')->with('success', 'Buku telah di kembalikan');
    }
}
