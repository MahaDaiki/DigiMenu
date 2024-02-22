<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'article_number', 'scan_limit', 'media_type'];

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
}
