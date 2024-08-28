<?php

namespace App\Models;

use App\Models\KategoriBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'penerbit', 'tahun_terbit', 'image', 'penulis', 'category_id'];

 
    
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(KategoriBuku::class, 'kategori_pivots', 'book_id', 'category_id');
    }
}
