<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = ['Title', 'Content', 'Price', 'Image', 'menu_id', 'Category_id'];

    public function menu()
    {
        return $this->belongsTo(Menus::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
