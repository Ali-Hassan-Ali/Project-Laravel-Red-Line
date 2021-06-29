<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoreyController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:categorey_read'])->only('index');
        $this->middleware(['permission:categorey_create'])->only('create');
        $this->middleware(['permission:categorey_update'])->only('edit');
        $this->middleware(['permission:categorey_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $categoreys = Categorey::whenSearch(request()->search)->orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.categorey.index', compact('categoreys'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.categorey.create');
    }//end of create

    
    public function store(CategoryRequest $request, Categorey $categorey)
    {

        $request->validate([
            'name_ar' => ['required'],
            'name_en' => ['required']
        ]);

        try {

            categorey::create([
                'name' => [
                    'ar' => $request['name_ar'], 
                    'en' => $request['name_en'],
                ]
            ]);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.categorey.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit(Categorey $categorey)
    {
        return view('dashboard.categorey.edit', compact('categorey'));
    }//end of edit

    
    public function update(Request $request, Categorey $categorey)
    {

        // dd($request->all());
        
        $request->validate([
            'name_ar'   => ['required'],
            'name_en'   => ['required'],
        ]);

        try {

            $categorey->update([
                'name' => [
                    'ar' => $request['name_ar'], 
                    'en' => $request['name_en'],
                ]
            ]);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.categorey.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Categorey $categorey)
    {
        try {

            $categorey->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.categorey.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end pf destroy

}//end pf controller
