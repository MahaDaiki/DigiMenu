<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opperateur extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['user_id', 'restaurant_id'];
    protected $table = 'opperateur';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class);
        
    }
}
