<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'open_at', 'close_at'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    public function operators()
    {
        return $this->hasMany(Operator::class);
    }
    public function owner()
    {
        return $this->hasOne(Owner::class);
    }

}
