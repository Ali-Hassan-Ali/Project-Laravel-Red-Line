<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserrController extends Controller
{
    public function profile($id)
    {
        $user = User::where('id', $id)->first();

        return view('home.profile',compact('user'));
        
    }//end of profile

    public function update_prfile(Request $request,$id)
    {

        $user = User::find($id);

        $request->validate([
            'name'        => 'required',
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
            'image'       => 'image',
        ]);

        $request_data = $request->except(['image']);

        if ($request->image) {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            } //end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        } //end of if

        $user->update($request_data);
        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->back();


    }//end of update_prfile
    
}//end of controller
