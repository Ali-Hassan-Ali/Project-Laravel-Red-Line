<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:clients_read'])->only('index');
        $this->middleware(['permission:clients_create'])->only('create','store');
        $this->middleware(['permission:clients_update'])->only('edit','update');
        $this->middleware(['permission:clients_delete'])->only('destroy');

    } //end of constructor    
    
    public function index()
    {
        $clients = User::whereRoleIs('clients')->whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.clients.index', compact('clients'));

    }//end of index

    
    
    public function create()
    {
        return view('dashboard.clients.create');
    }//end of create

    
    
    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => 'required|unique:users',
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'password'    => 'required|confirmed',
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/user_images/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            $user = User::create($request_data);
            $user->attachRole('clients');

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end pf store

    

    public function show(User $user)
    {
        return view('dashboard.clients.edit', compact('user'));
    }//end pof show

    

    public function edit(User $user)
    {
        return view('dashboard.clients.edit', compact('user'));
    }//end of edit



    public function update(Request $request, User $user)
    {
    
        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'permissions' => 'required|min:1',
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($user->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

                } //end of inner if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/user_images/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of external if

            $user->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end po update



    public function destroy(User $user)
    {
        try {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            } //end of if

            $user->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end pf controller
