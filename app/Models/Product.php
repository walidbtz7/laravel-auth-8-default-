<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id','serie','categorie_id','picture'
    ];
    protected $primaryKey = 'id';
    public function categorie(){
        return $this->belongsTo(Category::class);

    }
}
