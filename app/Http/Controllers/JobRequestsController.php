<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobRequestsController extends Controller
{
    public function create() {
        return view("jobrequests.create");
    }

    public function store(Request $request) {
        $post = $request->all();

        \App\Models\JobRequests::create($post);

      return  response()->json("job request created successfully",200);
    }
   
}
