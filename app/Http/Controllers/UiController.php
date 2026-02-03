<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index(){
        $ui = \App\Models\Ui::all();
        return view("ui.index",compact("ui"));
    }

    public function show(){
        $ui = \App\Models\Ui::all();
        return view("ui.show",compact("ui"));
    }
}
