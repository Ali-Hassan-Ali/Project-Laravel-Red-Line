<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categorey;
use Illuminate\Http\Request;

class WelcomController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:dashboard_read'])->only('index');

    } //end of constructor

    public function index()
    {
        $users_count = User::whereRoleIs('admin')->count();
        $categorys_count = Categorey::count();

        return view('dashboard.welcome',compact('users_count','categorys_count'));
    }//end of index
    
}//end of controller
