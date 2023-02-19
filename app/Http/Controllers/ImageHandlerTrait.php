<?php

namespace App\Http\Controllers;

use App\MyHelpers;
use Illuminate\Http\UploadedFile;

trait ImageHandlerTrait
{
    /**
     * @param UploadedFile $requestFile
     * @param string $pathToSave
     * @return string|bool
     */
    public function handleRequestImage(UploadedFile $requestFile, string $pathToSave): string | bool{
        if ($requestFile)
            return MyHelpers::uploadImage($requestFile, $pathToSave);
        return false;
    }
}
