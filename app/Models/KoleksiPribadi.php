<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use App\Models\KategoriBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id'];
    
    
    
    
    public function book(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   
}
