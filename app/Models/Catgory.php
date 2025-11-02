<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Catgory extends Model implements HasMedia
{
    use InteractsWithMedia;
    // protected $guarded=['id'];
    protected $fillable = [
        'name', 
        'parint', 
        'user_id'
    ];
        public function getImageAttribute()
    {
        $media = $this->getFirstMedia('imagesCat');
        return $media ? $media->getUrl() : null;
    }

     public function product(){
        return $this->hasMany(Product::class,'catgorey_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
  
}
