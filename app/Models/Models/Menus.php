<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $fillable = ['Video', 'QRCode', 'restaurant_id'];

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class);
    } 
}
