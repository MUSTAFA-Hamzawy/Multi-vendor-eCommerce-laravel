<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class MyHelpers
{

    /**
     * @param string $originalName
     * @return string
     */
    public static function encryptFileName(string $originalName): string{
        return substr(md5(time() . $originalName), 0, 80);
    }

    /**
     * @param $file
     * @param string $path
     * @return string
     */
    public static function uploadFile($file, string $path): string{
        // encrypt the file name
        $extension = $file->getClientOriginalExtension();
        $encryptedName = self::encryptFileName($file->getClientOriginalName() . time() . rand(1, 9));
        $fileName = $encryptedName . '.' . $extension;
        $file->move($path, $fileName);
        return $fileName;
    }

    /**
     * @param $image
     * @param string $relativePath
     * @return string
     */
    public static function uploadImage($image, string $relativePath): string{
        return MyHelpers::uploadFile($image, public_path($relativePath));
    }

    /**
     * @param string $imageName
     * @param string $relativePath
     * @return void
     */
    public static function deleteImageFromStorage(string $imageName, string $relativePath){
        // delete image from the uploaded images file
        $image = public_path($relativePath) . $imageName;
        try {
            unlink($image);
        }catch (Exception $exception){
            // log that exception
        }
    }

    /**
     * @param string $timestamp
     * @return string
     */
    public static function getDiffOfDate(string $timestamp): string{
        $result = Carbon::parse($timestamp)->diffForHumans();
        return $result;
    }
}
