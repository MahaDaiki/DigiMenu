<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Articles extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $table = 'articles';
    protected $fillable = ['Title', 'Content', 'Price',  'menu_id', 'Category_id' ,'id_media'];

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'menu_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }
}
