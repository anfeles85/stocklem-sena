<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = [
        'name',
        'quantity',
        'photo',
        'technical_sheet',
        'id_presentation',
        'id_category',
        'id_supplier'
    ];

    public function presentation() {
        return $this->belongsTo(Presentation::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
