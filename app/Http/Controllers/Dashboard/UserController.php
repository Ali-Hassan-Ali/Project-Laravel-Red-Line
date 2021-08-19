<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create','store');
        $this->middleware(['permission:users_update'])->only('edit','update');
        $this->middleware(['permission:users_delete'])->only('destroy');

    } //end of constructor

    public function index(Request $request)
    {

        $users = User::whereRoleIs('admin')->whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.users.index', compact('users'));

    } //end of index

    public function create()
    {
        return view('dashboard.users.create');

    } //end of create

    public function store(Request $request)
    {

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => 'required|unique:users',
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'password'    => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
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
            
            $user->attachRole('admin');
            $user->syncPermissions($request->permissions);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.users.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of store

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));

    } //end of user

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'permissions' => 'required|min:1',
        ]);


        try {

            $request_data = $request->except(['permissions', 'image']);

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

            $user->syncPermissions($request->permissions);
            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.users.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of update

    public function destroy(User $user)
    {

        try {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            } //end of if

            $user->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.users.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of destroy

} //end of controller
