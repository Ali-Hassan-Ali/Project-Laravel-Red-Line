<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Product;
use App\models\Categorey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:products_read'])->only('index');
        $this->middleware(['permission:products_create'])->only('create','store');
        $this->middleware(['permission:products_update'])->only('edit','update');
        $this->middleware(['permission:products_delete'])->only('destroy');

    }//end of constructor
 
    public function index(Request $request)
    {
        $products = Product::whenSearch(request()->search , $request)->latest()->paginate(10);

        return view('dashboard.products.index', compact('products'));
    }//end of index


    public function create()
    {
        $categorys = Categorey::all();

        return view('dashboard.products.create',compact('categorys'));
    }///end of create


    public function store(Request $request)
    {

        $request->validate([
            'name_ar'     => ['required','max:255'],
            'name_en'     => ['required','max:255'],
            'descp_ar'    => ['required','max:255'],
            'descp_en'    => ['required','max:255'],
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'price'       => ['required'],
            'quantity'    => ['required','max:255'],
        ]);

        try {

            $request_data = $request->except(['image','name_ar','name_en','descp_ar','descp_en']);

            $request_data['name']        = ['ar' => $request->name_ar,  'en' => $request->name_en];
            $request_data['description'] = ['ar' => $request->descp_ar, 'en' => $request->descp_en];

            if ($request->image) {

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })//resize image
                    ->save('uploads/product_image/' . $request->image->hashName());//move foder image

                $request_data['image'] = $request->image->hashName();//rename image

            } //end of if

            Product::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Product $product)
    {
        $categorys = Categorey::all();
        return view('dashboard.products.edit',compact('product','categorys'));
    }//end of edit


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_ar'     => ['required','max:255'],
            'name_en'     => ['required','max:255'],
            'descp_ar'    => ['required','max:255'],
            'descp_en'    => ['required','max:255'],
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'price'       => ['required'],
            'quantity'    => ['required','max:255'],
        ]);
        return 'fdf';

        try {

            $request_data = $request->except(['image','name_ar','name_en','descp_ar','descp_en']);

            $request_data['name']        = ['ar' => $request->name_ar,  'en' => $request->name_en];
            $request_data['description'] = ['ar' => $request->descp_ar, 'en' => $request->descp_en];

            if ($request->image) {

                if ($product->image != 'default.jpg') {

                    Storage::disk('public_uploads')->delete('/product_image/' . $product->image);//deleted odl image

                } //end of inner if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })//resize image
                    ->save('uploads/product_image/' . $request->image->hashName());//move folder image

                $request_data['image'] = $request->image->hashName();//rename image

            } //end of if

            $product->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Product $product)
    {
        try {

            if ($product->image != 'default.jpg') {

                Storage::disk('public_uploads')->delete('/product_image/' . $product->image);

            } //end of if

            $product->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
