<?php

namespace App\Traits ;

use Illuminate\Support\Facades\Storage;

trait ImageFile 
{

    public function uploadFile($image,$folder)
    {
        $name = $image->hashName();
        $image->store($folder);
        $data = ['url' => $name];
        return $data;
    }

    public function updateFile($image,$oldImage,$folder)
    {
            Storage::disk('public')->delete( $folder .'/'.$oldImage);
            $name = $image->hashName();
            $image->store($folder);
            $data = ['url'=>$name] ;
            return $data ;
    }

    public function deleteFile($nameImage , $folder)
    {
        $path = $folder . '/' . $nameImage;
        if(Storage::disk('public')->exists($path))
        {
            Storage::delete($path);
        }
        return 1;
    }
}