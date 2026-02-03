<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generateInvoice(Jobs $jobs)
    {
        // Load relationships
        $job = Jobs::with(['customer', 'carmodel', 'employee', 'parts'])->find($jobs->id);

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        // Calculate part-wise total and grand total
        $partsData = [];
        $grandTotal = 0;

        foreach ($job->parts as $part) {
            $pivot = $part->pivot;

            $lineTotal = $pivot->total; // already calculated and saved during job creation

            $partsData[] = [
                'name' => $part->name,
                'hsn_code' => $pivot->hsn_code,
                'uom' => $pivot->uom,
                'quantity' => $pivot->quantity,
                'rate' => $pivot->rate,
                'sale_rate' => $pivot->sale_rate,
                'sgst' => $pivot->sgst,
                'cgst' => $pivot->cgst,
                'igst' => $pivot->igst,
                'total' => $lineTotal,
            ];

            $grandTotal += $lineTotal;
        }

        // Pass job, parts, and totals to view
        $pdf = Pdf::loadView('invoices.job-invoice', [
            'job' => $job,
            'partsData' => $partsData,
            'grandTotal' => $grandTotal,
        ]);

        return $pdf->download('invoice_' . $job->id . '.pdf');
    }

    public function index(){
        $invoices = \App\Models\Invoice::all();
        return view("invoices.index",compact("invoices"));
    }
}
