<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
protected $table = 'category';
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(Articles::class, 'Category_id');
    }
}
