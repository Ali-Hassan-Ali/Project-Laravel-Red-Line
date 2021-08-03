<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:payments_read'])->only('index');
        $this->middleware(['permission:payments_create'])->only('create');
        $this->middleware(['permission:payments_update'])->only('edit');
        $this->middleware(['permission:payments_delete'])->only('destroy');

    } //end of constructor
    
    public function index()
    {
        $payments = Payment::latest()->paginate(5);

        return view('dashboard.payments.index', compact('payments'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.payments.create');
    }//end of create

    
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                Image::make($request->image)
                    ->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/payment_image/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            Payment::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.payments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Payment $payment)
    {
        return view('dashboard.payments.edit',compact('payment'));
    }//end pf edit

    
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'image' => 'image',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($gallery->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/payment_image/' . $gallery->image);

                } //end of if

                Image::make($request->image)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/payment_image/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            $payment->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.payments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of update


    public function destroy(Payment $payment)
    {
        try {

            if ($payment->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/payments_image/' . $payment->image);

            } //end of if

            $payment->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.payments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
