<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class Uploadservice
{

    public function uploadImage(UploadedFile $uploadedFile)
    {

        $path = $uploadedFile->storeAs('news', $uploadedFile->hashName(), 'public');

        if ($path === false) {
            throw new UploadException('Не удалось загрузить файл');
        }
        return $path;
    }
}
