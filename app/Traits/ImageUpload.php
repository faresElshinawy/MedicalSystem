<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait ImageUpload {
    public function upload($request,$path,$image_name = null)
    {
        if($request->hasFile('image'))
        {
            $this->remove($path,$image_name);
            $image = $request->file('image');
            $image_name = uniqid('',true).'_'.$image->getClientOriginalName();
            $image->move(public_path($path),$image_name);
        }

        return $image_name;
    }

    public function remove($path,$image_name)
    {
        if(File::exists(public_path($path.'/'.$image_name)))
        {
            File::delete(public_path($path.'/'.$image_name));
        }
    }
}
