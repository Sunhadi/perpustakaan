<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $total_buku = Buku::count();
        $total_categories = KategoriBuku::count();
        $total_users = User::count();
        $total_buku_dipinjam = Peminjaman::where('status', 'dipinjam')->count();
        return view('admin.dashboard', compact('total_buku', 'total_categories', 'total_users', 'total_buku_dipinjam'));
    }
    
}
