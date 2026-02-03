<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){
        $customers = \App\Models\Customers::all();
        return view("customers.index",compact("customers"));
    }
    
    public function create() {
        return view("customers.create");
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'email' => 'nullable|email',
        'address' => 'nullable|string',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'country' => 'required|string|max:255',
    ]);

    $customer = \App\Models\Customers::create($validated);

    // Check if the request expects JSON (i.e., it's an AJAX call)
    if ($request->expectsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Customer added successfully!',
            'customer' => $customer // optional if you want to use this data in JS
        ]);
    }

    // Fallback for non-AJAX requests (just in case)
    return redirect()->back()->with('success', 'Customer added successfully!');
}




    // public function store(Request $request) {
    //     $post = $request->all();

    //     \App\Models\Customers::create($post);

    //   return  response()->json("customers created successfully",200);
    // }


//     public function storeFromJob(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'mobile' => 'required|string|max:20',
//         'email' => 'nullable|email',
//         'address' => 'nullable|string',
//     ]);

//     $customer = \App\Models\Customers::create($validated);

//     return response()->json([
//         'status' => 'success',
//         'message' => 'Customer added successfully!',
//         'customer' => $customer
//     ]);
// }



//     public function getCustomer($id)
// {
//     $customer = \App\Models\Customers::find($id);
//     return response()->json($customer);
// }

   

    public function edit($id) {
        $customers = \App\Models\Customers::find($id);
        return view("customers.edit",compact("customers"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\Customers::where('id',$post['id'])->update($post);

      return  response()->json("customers updated successfully",200);
    }
   

    public function delete(Request $request, $id)
    {
        \App\Models\Customers::where("id", $id)->delete();
        
        $request->session()->flash('success', "Customers Deleted Successfully");

        return redirect()->route('customers-index');
    }
}
