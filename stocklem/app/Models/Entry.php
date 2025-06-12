<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table = 'entry';

    protected $fillable = [
        'sena_code',
        'date',
        'expiration_date',
        'quantity',
        'observations',
        'id_article'
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
