<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload {
    public function upload($request,$path,$file_name = null)
    {
        if($request->hasFile('file'))
        {
            $this->remove($path,$file_name);
            $file = $request->file('file');
            $file_name = uniqid('',true).'_'.$file->getClientOriginalName();
            $file->move(public_path($path),$file_name);
        }

        return $file_name;
    }

    public function remove($path,$file_name)
    {
        if(File::exists(public_path($path.'/'.$file_name)))
        {
            File::delete(public_path($path.'/'.$file_name));
        }
    }
}
