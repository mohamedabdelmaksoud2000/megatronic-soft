<?php

namespace App\Models;

use App\Traits\ImageFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory,ImageFile;
    
    protected $fillable = [
        'name',
        'description'
    ];

    // public $translatable = ['name','description'];

    public function teches()
    {
        return $this->belongsToMany(Tech::class,'tech_service','service_id','tech_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class , 'imageable');
    }

    public function setImage($request)
    {
        $data = $this->uploadFile($request->image_file,'services');
        $this->image()->create($data);
    }

    public function updateImage($request)
    {
        if($request->image_file != null)
        {
            $data = $this->updateFile($request->image_file,$this->image->url,'services');
            $this->image()->update($data);
        }
    }

    public function deleteImage()
    {
        $this->deleteFile($this->image->url,'services');
    }

    public function getImageUrlAttribute()
    {
        return asset('app/services/'.$this->image->url);
    }

}
