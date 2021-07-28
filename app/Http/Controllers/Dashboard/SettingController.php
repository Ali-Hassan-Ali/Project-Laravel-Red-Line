<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function service_index()
    {
        return view('dashboard.settings.services.create');
    }//end of settings services

    public function contact_index()
    {
        return view('dashboard.settings.services.contact_us');   
    }//end of settings contacts

    public function social_links()
    {
        return view('dashboard.settings.services.social_links');   
    }

    public function store(Request $request)
    {
        setting($request->all())->save();
        session()->flash('success', 'dashboard.updated_successfully');
        return redirect()->back();

    }// end of store

}//end of controller
