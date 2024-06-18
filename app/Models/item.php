<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'price', 'category_id', 'description', 'image', 'created_at', 'updated_at'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
