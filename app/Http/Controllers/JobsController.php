<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        $jobs = \App\Models\Jobs::with('customer', 'carmodel', 'parts', 'employee','gst')->get();
       // dd($jobs->toArray()); // Debug output......gst
        return view("jobs.index", compact("jobs"));
        
    }
    
    public function create() {
        $customers = \App\Models\Customers::all();
        $carmodels = \App\Models\CarModels::all();
        $parts = \App\Models\Parts::all();
        $employees = \App\Models\Employees::all();
        $gst = \App\Models\Gst::all();
        //$gst = \App\Models\Gst::all();......gst
        return view("jobs.create",compact("customers","carmodels","parts","employees","gst"));
    }

public function fetchCustomer($id)
{
    try {
        $customer = \App\Models\Customers::with([
            'jobs.carmodel', // eager load car model
            'jobs.parts',    // eager load parts
        ])->findOrFail($id);

        return response()->json([
            'customer' => $customer,
            'jobs' => $customer->jobs,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function fetchCustomerByVin(Request $request)
{
    $vin = $request->input('vin');

    $car = \App\Models\Cars::with('customer')->where('vin', 'like', "%{$vin}%")->first();

    if (!$car || !$car->customer) {
        return response()->json([
            'customer' => null,
            'jobs' => [],
        ]);
    }

    $customer = $car->customer;

    $jobs = \App\Models\Jobs::where('customer_id', $customer->id)->with(['parts', 'car'])->latest()->get();

    return response()->json([
        'customer' => $customer,
        'jobs' => $jobs
    ]);
}

public function getLatestJob($customer_id)
{
    $job = \App\Models\Jobs::where('customer_id', $customer_id)
        ->with(['parts', 'employee']) // Adjust relations as per your model
        ->latest()
        ->first();

    if (!$job) {
        return response()->json(['success' => false, 'message' => 'No previous job found.']);
    }

    return response()->json([
        'success' => true,
        'job' => $job,
        'parts' => $job->parts ?? [],
        'employee' => $job->employee ?? null,
    ]);
}

    public function store(Request $request)
{
    // You add dd here
   // dd($request->all());

    // Validate your request (optional but recommended)
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'car_id' => 'required|exists:cars,id',
        'type' => 'required|string',
        'status' => 'required|string',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after_or_equal:start_time',
        'expected_delivery' => 'required|date|after_or_equal:start_time',
        'employee_id' => 'required|exists:employees,id',
       //'gst_id' => 'required|exists:gsts,id',

        'part_id' => 'required|array',
        'quantity' => 'required|array',
        'rate' => 'required|array',
        'sale_rate' => 'required|array',
        // 'sgst' => 'required|array',
        // 'cgst' => 'required|array',
        // 'igst' => 'required|array',
       'sgst_id' => 'required|array',
    'cgst_id' => 'required|array',
    'igst_id' => 'required|array',

        'total_cost' => 'required|array',
        'hsn_code' => 'nullable|array',
        'uom' => 'nullable|array',
    ]);

    // Create the job
    $job = \App\Models\Jobs::create([
        'customer_id' => $request->customer_id,
        'car_id' => $request->car_id,
        'type' => $request->type,
        'insurance_company' => $request->insurance_company,
        'policy_number' => $request->policy_number,
        'status' => $request->status,
        'remarks' => $request->remarks,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'expected_delivery' => $request->expected_delivery,
        'employee_id' => $request->employee_id,
        //'gst_id' => $request->gst_id,
    ]);

// Attach parts with pivot data
$partIds = $request->part_id;
foreach ($partIds as $index => $partId) {
    $job->parts()->attach($partId, [
        'job_id'     => $job->id,
        'quantity'   => $request->quantity[$index],
        'rate'       => $request->rate[$index],
        'sale_rate'  => $request->sale_rate[$index],
        'sgst'       => $request->sgst_id[$index] ?? null, // ✅ Corrected this line
        'cgst'       => $request->cgst_id[$index] ?? null,
        'igst'       => $request->igst_id[$index] ?? null,
        'total'      => $request->total_cost[$index],
        'hsn_code'   => $request->hsn_code[$index] ?? null,
        'uom'        => $request->uom[$index] ?? null,
    ]);
}


    return redirect()->route('jobs-index')->with('success', 'Job created successfully.');
}


    public function edit($id) {
        $jobs = \App\Models\Jobs::find($id);
        return view("jobs.edit",compact("jobs"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\Jobs::where('id',$post['id'])->update($post);

      return  response()->json("jobs updated successfully",200);
    }

    public function delete(Request $request, $id)
    {
        \App\Models\Jobs::where("id", $id)->delete();
        
        $request->session()->flash('success', "Jobs Deleted Successfully");

        return redirect()->route('jobs-index');
    }
}
