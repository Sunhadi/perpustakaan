<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        
        $peminjaman = Peminjaman::latest()->where('status', 'selesai')->get();
        return view('admin.laporan.index', compact('peminjaman'));
    }
}
