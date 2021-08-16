<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
 
    public function index()
    {
        $orders = Purchase::all();

        return view('dashboard.orders.index',compact('orders'));

    }//end of index
    
    public function create()
    {
        //
    }//end of create

    
    public function store(Request $request)
    {
        //
    }//end of store

    
    public function show(Purchase $purchase)
    {
        //
    }//end of show

    
    
    public function edit(Purchase $purchase)
    {
        //
    }//end of edit

    
    public function update(Request $request, Purchase $purchase)
    {
        //
    }//end of update

    
    public function destroy(Purchase $purchase)
    {
        //
    }//end of destroy


}//end of controller
