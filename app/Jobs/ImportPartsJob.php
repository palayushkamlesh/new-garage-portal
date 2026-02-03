<?php

// namespace App\Jobs;

// use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\PartsImport;
// use Illuminate\Bus\Queueable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;

// class ImportPartsJob implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $filePath;

//     public function __construct($filePath)
//     {
//         $this->filePath = $filePath;
//     }

//     public function handle()
//     {
//         Excel::import(new PartsImport, storage_path('app/' . $this->filePath));
//     }
// }





// namespace App\Jobs;

// use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\PartsImport;
// use Illuminate\Bus\Queueable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Support\Facades\Log;

// class ImportPartsJob implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $filePath;

//     public function __construct($filePath)
//     {
//         $this->filePath = $filePath;
//     }

//     public function handle()
//     {
//         try {
//             Excel::import(new PartsImport, storage_path("app/{$this->filePath}"));
//             Log::info('Import completed successfully: ' . $this->filePath);
//         } catch (\Exception $e) {
//             Log::error('Import failed: ' . $e->getMessage());
//         }
//     }
// }
