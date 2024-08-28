<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Role;
use App\Models\User;
use App\Models\KategoriBuku;
use App\Models\KategoriPivot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'administrator',
        ]);
        Role::create([
            'name' => 'petugas',
        ]);
        Role::create([
            'name' => 'peminjam',
        ]);
        
        User::create([
            'username' => 'admin',
            'nama_lengkap' => 'Rangga Bayu Pratama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'petugas',
            'nama_lengkap' => 'Rangga Bayu Pratama',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('petugas123'),
            'role_id' => 2
        ]);
        
        User::create([
            'username' => 'peminjam',
            'nama_lengkap' => 'Rangga Bayu Pratama',
            'email' => 'peminjam@gmail.com',
            'password' => Hash::make('peminjam123'),
            'role_id' => 3
        ]);

        KategoriBuku::create([
            'nama_kategori' => 'fiksi'
        ]);
        KategoriBuku::create([
            'nama_kategori' => 'horror'
        ]);
        KategoriBuku::create([
            'nama_kategori' => 'comedy'
        ]);
        KategoriBuku::create([
            'nama_kategori' => 'drama'
        ]);

        Buku::create([
            'judul' => 'Dilan 1991',
            'penulis' => 'Rangga Bayu Pratama',
            'penerbit' => 'SMK Fatahillah',
            'tahun_terbit' => now()->format('Y-m-d'),
            'image' => 'Dilan 1991-2024-02-21.jpg',
            
        ]);

        Buku::create([
            'judul' => 'Laskar 1991',
            'penulis' => 'Rangga Bayu Pratama',
            'penerbit' => 'SMK Fatahillah',
            'tahun_terbit' => now()->format('Y-m-d'),
            'image' => 'Laskar pelangi-2024-02-21.jpg',
            
        ]);

        KategoriPivot::create([
            'book_id' => 1,
            'category_id' => 1
        ]);
        KategoriPivot::create([
            'book_id' => 1,
            'category_id' => 2
        ]);
        KategoriPivot::create([
            'book_id' => 1,
            'category_id' => 4
        ]);
        KategoriPivot::create([
            'book_id' => 2,
            'category_id' => 3
        ]);
        KategoriPivot::create([
            'book_id' => 2,
            'category_id' => 4
        ]);
        KategoriPivot::create([
            'book_id' => 2,
            'category_id' => 1
        ]);
    }
}
