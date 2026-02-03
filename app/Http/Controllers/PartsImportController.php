<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartsImport;

class PartsImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        // Import Data
        Excel::import(new PartsImport, $request->file('file'));

        return back()->with('success', 'Parts imported successfully!');
    }

    public function index()
    {
        return view('partsimport.index'); // Ensure the correct folder name
    }
}
