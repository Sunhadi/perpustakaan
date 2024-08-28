<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function pinjam($id){
        $pinjam = Peminjaman::create([
            'user_id' => Auth::user()->id,
            'buku_id' => $id,
            'status' => 'menunggu',
            'tanggal_peminjaman' => Carbon::now(),
            'tanggal_wajib_pengembalian' => Carbon::now()->addDays(3)
        ]);
        return redirect('/daftar-pinjam')->with('success', 'Meminjam buku berhasil');
    }
}
