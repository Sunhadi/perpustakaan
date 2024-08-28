<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $kategori = KategoriBuku::all();
        return view('admin.category.index', compact('kategori'));
    }
    public function create(){

        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_bukus'
        ]);

        KategoriBuku::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/category-tambah')->with('success', 'Tambah kategori berhasil');
    }

    public function edit($id){
        $kategori = KategoriBuku::findOrFail($id);
        return view('admin.category.edit', compact('kategori'));
    }
    public function update(Request $request){
        $kategori = KategoriBuku::find($request->id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/category')->with('success', 'Kategori berhasil di ubah');
    }

    public function destroy(Request $request){
        
        KategoriBuku::find($request->id)->delete();
        return redirect('/category')->with('success', 'Kategori berhasil di Hapus');
    }
}
