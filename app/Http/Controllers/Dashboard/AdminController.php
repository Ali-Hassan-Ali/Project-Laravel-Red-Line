<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:admin_update'])->only('edit','update');

    } //end of constructor

    public function edit($id)
    {
        $admin = User::Find($id);

        return view('dashboard.admin.edit',compact('admin'));
    }//end of edit

 
    public function update(Request $request, $id)
    {
        $admin = User::Find($id);

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($admin->id)],
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'password'    => 'required|confirmed',
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($user->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/user_images/' . $admin->image);

                } //end of inner if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/user_images/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of external if

            $admin->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.welcome');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update admin


}//end of controller
