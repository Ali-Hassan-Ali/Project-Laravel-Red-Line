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
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

    } //end of constructor

    public function index(Request $request)
    {

        $users = User::whereRoleIs('admin')->whenSearch(request()->search)->orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.users.index', compact('users'));

    } //end of index

    public function create()
    {
        return view('dashboard.users.create');

    } //end of create

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'        => 'required',
            'email'       => 'required|unique:users',
            'image'       => 'image',
            'password'    => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        } //end of if

        $user = User::create($request_data);
        // dd($request->all());
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.users.index');

    } //end of store

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));

    } //end of user

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'        => 'required',
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
            'image'       => 'image',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['permissions', 'image']);

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

        } //end of external if

        $user->update($request_data);

        $user->syncPermissions($request->permissions);
        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    } //end of update

    public function destroy(User $user)
    {
        if ($user->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

        } //end of if

        $user->delete();
        session()->flash('success', __('dashboard.deleted_successfully'));
        return redirect()->route('dashboard.users.index');

    } //end of destroy

} //end of controller
