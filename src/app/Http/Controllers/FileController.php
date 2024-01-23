<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class FileController extends Controller // File controller class
{
    public function getFileSizes() // Function to get file sizes
    {
        $folderPath = storage_path('app/files'); // Set folder path
        $files = File::files($folderPath); // Get all files in folder

        $fileSizes = []; // Initialize file sizes array

        foreach ($files as $file) {   // Loop through each file
            $fileSizes[basename($file)] = File::size($file);  // Get and store file size
        }

        return response()->json($fileSizes);  // Return file sizes as JSON response
    }
}
