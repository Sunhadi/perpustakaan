<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoribukuRelasi extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'buku_id'];
}
