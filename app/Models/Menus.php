<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// implements HasMedia
class Menus extends Model 
{
    use HasFactory;
    protected $fillable = ['title','QRCode', 'restaurant_id'];

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class);
    } 
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('videos')
            ->singleFile();

    }

    public function QR(): void
    {
        $this->addMediaCollection('qrcodes')
            ->singleFile();
    }
    // public function getMedia(string $collectionName = 'default', $filters = [])
    // {
    //     return $this->getMediaCollection($collectionName, $filters);
    // }

    // public function getMediaModel()
    // {
    //     // Return the media model class
    //     return \Spatie\MediaLibrary\MediaCollections\Models\Media::class;
    // }
}
