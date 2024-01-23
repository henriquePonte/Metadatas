<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadFileService
{
    public function processUploadedFile(UploadedFile $file)
    {
        $fileDetails = [
            'name' => $file->getClientOriginalName(),
            'extension' => $file->getClientOriginalExtension(),
            'realPath' => $file->getRealPath(),
            'size' => $file->getSize(),
            'mimeType' => $file->getMimeType(),
        ];

        $destinationPath = 'uploads';
        $file->move($destinationPath, $fileDetails['name']);

        return $fileDetails;
    }
}
