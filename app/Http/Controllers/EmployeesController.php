<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = \App\Models\Employees::all();
        return view("employees.index",compact("employees"));
    }

    public function create() {
        $employeetypes = \App\Models\EmployeeTypes::all();
        return view("employees.create",compact("employeetypes"));  
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\Employees::create($post);

      return  response()->json("employees created successfully",200);
    }

    public function edit($id) {
        $employees = \App\Models\Employees::find($id);
        return view("employees.edit",compact("employees"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\Employees::where('id',$post['id'])->update($post);

      return  response()->json("employees updated successfully",200);
    }

    public function delete(Request $request, $id)
    {
        \App\Models\Employees::where("id", $id)->delete();
        
        $request->session()->flash('success', "employees Deleted Successfully");

        return redirect()->route('employees-index');
    }
}
