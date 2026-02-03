<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeTypesController extends Controller
{
    public function index(){
        $employeetypes = \App\Models\EmployeeTypes::all();
        return view("employeetypes.index",compact("employeetypes"));
    }
    
    public function create() {
        return view("employeetypes.create");
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\EmployeeTypes::create($post);

      return  response()->json("employeetypes created successfully",200);
    }
   

    public function edit($id) {
        $employeetypes = \App\Models\EmployeeTypes::find($id);
        return view("employeetypes.edit",compact("employeetypes"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\EmployeeTypes::where('id',$post['id'])->update($post);

      return  response()->json("employeetypes updated successfully",200);
    }
   

    public function delete(Request $request, $id)
    {
        \App\Models\EmployeeTypes::where("id", $id)->delete();
        
        $request->session()->flash('success', "employeetypes Deleted Successfully");

        return redirect()->route('employeetypes-index');
    }
}
