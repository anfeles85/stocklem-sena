<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issue';

    protected $fillable = [
        'date',
        'quantity',
        'observations',
        'id_article',
        'document',
        'id_unit'
    ];

    public function article() {
        return $this->belongsTo(Article::class, 'id_article');
    }

    public function person() {
        return $this->belongsTo(Person::class, 'document');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'id_unit');
    }
}
