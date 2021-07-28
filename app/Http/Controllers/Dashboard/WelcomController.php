<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categorey;
use App\Models\Product;
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
        $admins_count    = User::whereRoleIs('admin')->count();
        $users_count     = User::count();
        $categorys_count = Categorey::count();
        $products_count  = Product::count();

        return view('dashboard.welcome',compact('admins_count','users_count','categorys_count','products_count'));
    }//end of index
    
}//end of controller
