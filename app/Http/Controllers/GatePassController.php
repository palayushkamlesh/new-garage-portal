<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GatePassController extends Controller
{
   public function downloadPDF($id)
{
    $job = \App\Models\Jobs::with('customer') // make sure relationships exist
               ->with('car')
               ->findOrFail($id);

    return PDF::loadView('gatepass.pdf', compact('job'))
              ->download('gate_pass_'.$job->id.'.pdf');
}

}
