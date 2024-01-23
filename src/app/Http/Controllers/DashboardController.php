<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    protected $dashboardService;

    
    // Inject DashboardService
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

   // Get file sizes from app/files folder
   public function getFileSizes()
   {
       $folderPath = storage_path('app/files');
       $files = File::files($folderPath);
   
       // Initialize memory variables
       $totalMemoryGB = 1; // Assume a total memory of 1 GB
       $totalMemoryBytes = $totalMemoryGB * 1024 * 1024 * 1024; // Convert to bytes
       $occupiedMemory = 0;
   
       // Calculate occupied memory
       foreach ($files as $file) {
           $occupiedMemory += File::size($file);
       }
   
       // Calculate free memory
       $freeMemory = max(0, $totalMemoryBytes - $occupiedMemory); // Ensure non-negative value for free memory
   
       // Convert memory values to GB
       $occupiedMemoryGB = $occupiedMemory / (1024 * 1024 * 1024);
       $freeMemoryGB = $freeMemory / (1024 * 1024 * 1024);
   
       // Prepare memory data for response
       $memoryData = [
           'Memoria Livre' => $freeMemoryGB,
           'Memoria Ocupada' => $occupiedMemoryGB,
       ];
   
       return $memoryData;
   }
    public function index()
    {   
        // Get last seven documents
        $lastSevenDocuments = $this->dashboardService->getLastSevenDocuments();
        
        // Get file sizes
        $fileSizes = $this->dashboardService->getFileSizes(); 

       // Return view with compacted variables
        return view('dashboard.index', compact('lastSevenDocuments', 'fileSizes'));
    }


}
