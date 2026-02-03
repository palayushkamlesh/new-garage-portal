<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(){
        $cars = \App\Models\Cars::all();
        return view("cars.index",compact("cars"));
    }

    public function create() {
        $customers = \App\Models\Customers::all();
        $carmodels = \App\Models\CarModels::all();
        return view("cars.create",compact("customers","carmodels"));  
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\Cars::create($post);

      return  response()->json("cars created successfully",200);
    }

    public function edit($id) {
        $cars = \App\Models\Cars::find($id);
        return view("cars.edit",compact("cars"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\Cars::where('id',$post['id'])->update($post);

      return  response()->json("cars updated successfully",200);
    }

    public function delete(Request $request, $id)
    {
        \App\Models\Cars::where("id", $id)->delete();
        
        $request->session()->flash('success', "cars Deleted Successfully");

        return redirect()->route('cars-index');
    }
}
