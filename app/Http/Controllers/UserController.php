<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['role'])->where('role_id', '!=', 1)->get();
        return view('admin.user.index', compact('users'));
    }
    public function create(){

        $role = Role::all();
        return view('admin.user.create', compact('role'));
    }

    public function profile(){

        $user = User::findOrFail(Auth::user()->id);
        return view('profile', compact('user'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required|alpha_dash|unique:users',
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ],
    [
        'username.required' => 'Username tidak boleh kosong',
        'username.alpha_dash' => 'Username tidak boleh spasi',
        'username.unique' => 'Username sudah ada',
        'nama_lengkap.required' => 'Nama harus di isi',
        'email.required' => 'Email harus di isi',
        'email.unique' => 'Email sudah digunakan',
    ]);

    $useradd = User::create([
        'username' => $request->username,
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
    ]);

    return redirect('/user')->with('success', 'User berhasil di tambahkan');
    }
    

    public function acc($id){
        $user = User::find($id)->update([
            'role_id' => 2,
        ]);

        return redirect('/user')->with('success', 'User berhasil di acc');
    }

    public function down($id){
        $user = User::find($id)->update([
            'role_id' => 3,
        ]);

        return redirect('/user')->with('success', 'User berhasil di down');
    }

    public function listPinjam(){
        $pinjaman = Peminjaman::with(['user', 'buku'])->where('user_id', Auth::user()->id)->get();
        return view('user.daftar-pinjam', compact('pinjaman'));
    }

    public function koleksi(){

        $bukus = KoleksiPribadi::with(['book', 'user'])->get();
       
        return view('user.koleksi', compact('bukus'));
    }

    public function simpanKoleksi($id){

        KoleksiPribadi::create([
            'user_id' => Auth::user()->id,
            'book_id' => $id
        ]);

        return redirect('/koleksi')->with('success', 'Buku berhasil di simpan ke koleksi');
    }

    public function destroy(Request $request){
        $hapusbuku = KoleksiPribadi::find($request->id)->delete();
        return redirect('/koleksi')->with('success', 'Koleksi berhasil di hapus');
    }

    public function profileUpdate(Request $request){
        

        if ($request->has('image')) {
            
            $extension = $request->file('image')->extension();
            $nameimg = $request->username . '-' . now()->format('Y-m-d') . '.' . $extension;
            $request->file('image')->storeAs('public/profile/', $nameimg);
        }   
        else{
            $nameimg = null;
        }

        $user_update = User::find($request->id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $nameimg,
            'alamat' => $request->alamat,
        ]);

        return redirect('/profile');
    }

    public function deleteUser(Request $request){
        $delete = User::find($request->id)->delete();
        return redirect('/logout');
    }
}
