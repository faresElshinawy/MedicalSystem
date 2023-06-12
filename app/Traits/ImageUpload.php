<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait ImageUpload {
    public function upload($request,$path)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = uniqid('',true).'_'.$image->getClientOriginalName();
            $image->move(public_path($path),$image_name);
        }
        else
        {
            $image_name = null;
        }
        return $image_name;
    }
}
