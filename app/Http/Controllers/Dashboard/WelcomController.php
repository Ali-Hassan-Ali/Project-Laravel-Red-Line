<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Categorey;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cupon;
use App\Models\Support;
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
        $clients_count   = User::whereRoleIs('clients')->count();
        $categorys_count = Categorey::count();
        $products_count  = Product::count();
        $cupons_count    = Cupon::count();
        $orders_unactive = Order::where('status',0)->count();
        $orders_active   = Order::where('status',1)->count();
        $supports_count  = Support::count();

        $sales_data = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as sum')
        )->groupBy('month')->get();

        return view('dashboard.welcome',compact('admins_count','clients_count','categorys_count','products_count',
            'orders_unactive','cupons_count','supports_count','orders_active','sales_data'));

    }//end of index
    
}//end of controller
