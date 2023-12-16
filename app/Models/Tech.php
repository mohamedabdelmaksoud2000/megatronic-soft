<?php

namespace App\Models;

use App\Traits\ImageFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    use HasFactory,ImageFile;

    protected $fillable = [
        'name',
    ];

    public function image()
    {
        return $this->morphOne(Image::class , 'imageable');
    }

    public function setImage($request)
    {
        $data = $this->uploadFile($request->image_file,'techs');
        $this->image()->create($data);
    }

    public function updateImage($request)
    {
        if($request->image_file != null)
        {
            $data = $this->updateFile($request->image_file,$this->image->url,'techs');
            $this->image()->update($data);
        }
    }

    public function deleteImage()
    {
        $this->deleteFile($this->image->url,'techs');
    }

    public function getImageUrlAttribute()
    {
        return asset('app/techs/'.$this->image->url);
    }

}
