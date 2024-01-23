<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UploadFileService;

class UploadFileController extends Controller
{
    protected $uploadFileService;

    public function __construct(UploadFileService $uploadFileService)
    {
        $this->uploadFileService = $uploadFileService;
    }

   public function index() {
      return view('uploads/uploadfile');
   }
   public function showUploadFile(Request $request) {
      $file = $request->file('image');
  
      // Display File Name
      echo 'File Name: ' . $file->getClientOriginalName();
      echo '<br>';
  
      // Display File Extension
      echo 'File Extension: ' . $file->getClientOriginalExtension();
      echo '<br>';
  
      // Display File Real Path
      echo 'File Real Path: ' . $file->getRealPath();
      echo '<br>';
  
      // Display File Size
      $fileSize = $file->getSize();
      echo 'File Size: ' . $fileSize . ' bytes';
      echo '<br>';
  
      // Display File Mime Type
      echo 'File Mime Type: ' . $file->getMimeType();
      echo '<br>';
  
      // Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath, $file->getClientOriginalName());
  
      // Calculate memory usage and pass it to the view
      $memoryUsage = memory_get_usage();
  
      // Pass both $fileSize and $memoryUsage to the view
      return view('dashboard')->with(['fileSize' => $fileSize, 'memoryUsage' => $memoryUsage]);
  }
  
}
