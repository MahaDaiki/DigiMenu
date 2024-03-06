<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = ['Title', 'Content', 'Price',  'menu_id', 'Category_id'];

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'menu_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }
}
