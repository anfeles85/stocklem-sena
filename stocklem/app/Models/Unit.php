<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = "unit";

    protected $fillable = [
        'name',
        'status'
    ];

    public function issues() {
        return $this->hasMany(Issue::class);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }

}
