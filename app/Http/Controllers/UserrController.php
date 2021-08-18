<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Support;
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
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
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
                    ->save(public_path('uploads/user_images/' . $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

            } //end of if

            $user->update($request_data);
            
            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update_prfile


    public function connect(Request $request)
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

            return response(['success' => true]);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of connect
    
}//end of controller
