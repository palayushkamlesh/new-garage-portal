<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartsImport;



class PartsController extends Controller
{
    public function index()
{
    $parts = \App\Models\Parts::paginate(10); // ✅ Loads only 10 records per page
    return view('parts.index', compact("parts"));
}

public function create() {
    return view("parts.create");
}

public function fetchParts(Request $request)
{
    $search = $request->input('search');
    $page = $request->input('page', 1);
    $perPage = 10; // Load only 10 parts at a time

    $query = \App\Models\Parts::query();

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%");
    }

    $parts = $query->paginate($perPage, ['*'], 'page', $page);

    return response()->json([
        'results' => $parts->items(),
        'pagination' => ['more' => $parts->hasMorePages()]
    ]);
}



public function store(Request $request) {
    $post = $request->all();

    \App\Models\Parts::create($post);

  return  response()->json("parts created successfully",200);
}




public function edit($id) {
    $parts = \App\Models\Parts::find($id);
    return view("parts.edit",compact("parts"));
}

public function update(Request $request) {
    $post = $request->all();

    unset($post['_token']);

    \App\Models\Parts::where('id',$post['id'])->update($post);

  return  response()->json("parts updated successfully",200);
}


public function delete(Request $request, $id)
{
    \App\Models\Parts::where("id", $id)->delete();
    
    $request->session()->flash('success', "Parts Deleted Successfully");

    return redirect()->route('parts-index');
}


public function import(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls,csv'
    ]);

    Excel::import(new PartsImport, $request->file('excel_file'));

    return redirect()->route('parts-index')->with('success', 'Parts imported successfully!');
}


}
 