<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function store(Request $request)
    {
        setting($request->all())->save();
        session()->flash('success', 'Data added successfully');
        return redirect()->back();

    }// end of store

}//end of controller
