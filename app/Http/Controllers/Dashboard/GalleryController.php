<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:gallerys_read'])->only('index');
        $this->middleware(['permission:gallerys_create'])->only('create');
        $this->middleware(['permission:gallerys_update'])->only('edit');
        $this->middleware(['permission:gallerys_delete'])->only('destroy');

    } //end of constructor

    public function index()
    {   
        $gallerys = Gallery::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.gallerys.index',compact('gallerys'));

    }//end of index

    
    public function create()
    {
        return view('dashboard.gallerys.create');
    }//end of create

    

    public function store(Request $request)
    {
        $request->validate([
            'image'          => 'image',
            'title_ar'       => 'required|max:255',
            'title_en'       => 'required|max:255',
        ]);

        try {

            $request_data             = $request->except(['image','title_ar','title_en']);
            $request_data['title']    = ['ar' => $request->title_ar, 'en' => $request->title_en];

            if ($request->image) {

                Image::make($request->image)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/gallery_image/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            Gallery::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallerys.edit',compact('gallery'));

    }//end of edit


    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image'       => 'image',
            'title_ar'    => 'required|max:255',
            'title_en'    => 'required|max:255',
        ]);

        try {

            $request_data             = $request->except(['image', 'title_ar','title_en']);
            $request_data['title']    = ['ar' => $request->title_ar, 'en' => $request->title_en];

            if ($request->image) {

                if ($gallery->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/gallery_image/' . $gallery->image);

                } //end of if

                Image::make($request->image)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/gallery_image/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            $gallery->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Gallery $gallery)
    {
        try {

            if ($gallery->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/gallery_image/' . $gallery->image);

            } //end of if

            $gallery->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//endo of destroy

}//end of controller
