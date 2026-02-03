<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarModelsController extends Controller
{
    public function index(){
        $carmodels = \App\Models\CarModels::all();
        return view("carmodels.index",compact("carmodels"));
    }
    
    public function create() {
        return view("carmodels.create");
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\CarModels::create($post);

      return  response()->json("CarModels created successfully",200);
    }
   

    public function edit($id) {
        $carmodels = \App\Models\CarModels::find($id);
        return view("carmodels.edit",compact("carmodels"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\CarModels::where('id',$post['id'])->update($post);

      return  response()->json("CarModels updated successfully",200);
    }
   

    public function delete(Request $request, $id)
    {
        \App\Models\CarModels::where("id", $id)->delete();
        
        $request->session()->flash('success', "CarModels Deleted Successfully");

        return redirect()->route('carmodels-index');
    }
}
