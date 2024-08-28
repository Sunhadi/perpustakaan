<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    public function buku(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'kategori_pivots', 'category_id', 'book_id');
    }
}
