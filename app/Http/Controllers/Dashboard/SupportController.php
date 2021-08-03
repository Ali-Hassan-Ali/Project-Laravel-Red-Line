<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:supports_read'])->only('index');
        $this->middleware(['permission:supports_create'])->only('create','store');
        $this->middleware(['permission:supports_update'])->only('edit','update');
        $this->middleware(['permission:supports_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {
        $supports = Support::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.supports.index', compact('supports'));

    }//end of index



    public function create()
    {
        return view('dashboard.supports.create');
    }//end of create



    public function store(Request $request)
    {
        $request->validate([
            'first_name'  => ['required','max:255'],
            'last_name'   => ['required','max:255'],
            'phone'       => ['required','max:255'],
            'email'       => ['required','max:255'],
            'title'       => ['required','max:255'],
            'body'        => ['required','max:255'],
        ]);

        try {

            Support::create($request->all());
            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.supports.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store



    public function edit(Support $support)
    {
        return view('dashboard.supports.edit',compact('support'));
    }//end of edit


    
    public function update(Request $request, Support $support)
    {
        $request->validate([
            'first_name'  => ['required','max:255'],
            'last_name'   => ['required','max:255'],
            'phone'       => ['required','max:255'],
            'email'       => ['required','max:255'],
            'title'       => ['required','max:255'],
            'body'        => ['required','max:255'],
        ]);

        try {

            $support->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.supports.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update
    
    
    public function destroy(Support $support)
    {   
        try {

            $support->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.supports.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller