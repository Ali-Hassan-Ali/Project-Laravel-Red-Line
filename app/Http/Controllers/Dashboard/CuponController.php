<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:cupons_read'])->only('index');
        $this->middleware(['permission:cupons_create'])->only('create','store');
        $this->middleware(['permission:cupons_update'])->only('edit','update');
        $this->middleware(['permission:cupons_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $cupons = Cupon::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.cupons.index', compact('cupons'));

    }//end of index

    
    
    public function create()
    {
        return view('dashboard.cupons.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'value' => 'required|max:255',
            'end'   => 'required',
        ]);//end of  validate

        try {

            Cupon::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.cupons.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of store

    

    public function edit(Cupon $cupon)
    {
        return view('dashboard.cupons.edit', compact('cupon'));
    }


    public function update(Request $request, Cupon $cupon)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'value' => 'required|max:255',
            'end'   => 'required',
        ]);//end of  validate

        try {

            $cupon->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.cupons.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of update


    public function destroy(Cupon $cupon)
    {
        try {

            $cupon->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.cupons.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
