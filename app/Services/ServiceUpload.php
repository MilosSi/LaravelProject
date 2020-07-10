<?php


namespace App\Services;



use Symfony\Component\HttpFoundation\File\UploadedFile;

class ServiceUpload
{
    public static function upload(UploadedFile $file,$path)
    {
        $image_name = time()."_".$file->getClientOriginalName();
        $pathNew=\public_path()."/assets/images/".$path;

        $file->move($pathNew,$image_name);

        return $image_name;
    }
}
