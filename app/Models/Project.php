<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'link'
    ];

    public function images()
    {
        return $this->morphMany(Image::class , 'imageable');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    

}
