<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GstController extends Controller
{
    public function index(){
        $gst = \App\Models\Gst::all();
        return view("gst.index",compact("gst"));
    }
    
    public function create() {
        return view("gst.create");
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\Gst::create($post);

      return  response()->json("gst created successfully",200);
    }
   

    public function edit($id) {
        $gst = \App\Models\Gst::find($id);
        return view("gst.edit",compact("gst"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);

        \App\Models\Gst::where('id',$post['id'])->update($post);

      return  response()->json("gst updated successfully",200);
    }
   

    public function delete(Request $request, $id)
    {
        \App\Models\Gst::where("id", $id)->delete();
        
        $request->session()->flash('success', "gst Deleted Successfully");

        return redirect()->route('gst-index');
    }
}
