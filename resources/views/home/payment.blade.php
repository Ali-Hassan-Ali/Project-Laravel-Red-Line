@extends('layouts.home.app')

@section('content')

@section('title', __('home.payment'))

	<!--start of contant section-->

    <div style="padding: 120px 0px 95px 0px">
        <h1 class="text-center text-white m-0">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.page') <span class="text-danger">@lang('home.payment')</span>
        </h1>
    </div>

	<!--end of contant section-->

	<!--start of contant payment-->
    @if (Cart::count() == 0)
                                
        <div class="d-block my-2 py-5 bg-dark">
            
            <h2 class="text-center text-white">@lang('dashboard.no_data_found')</h2>                                

        </div>

    @else

        <section id="payment" class="py-5">
            
            <div class="containe">

                <div class="col-md-8 offset-md-2">
                        <span class="anchor" id="formPayment"></span>
                        <hr class="my-5">

                        <!-- form card cc payment -->
                        <div class="card card-outline-secondary d-flex justify-content-center bg-dark text-white">
                            <div class="card-body">
                                <h3 class="text-center">
                                    <h1 class="text-center text-danger fw-300 my-5">@lang('home.payment')</h1>
                                    <div class="row d-flex justify-content-center">
                                        @foreach (App\Models\Payment::all()->take('6'); as $payment)

                                            <img src="{{ $payment->payment_path }}" width="100px" class="mx-1 my-2" style="border: solid #aaa 10px;">
                                            
                                        @endforeach
                                    </div>
                                </h3>
                                <hr>
                                <form class="form" action="{{ route('create.order') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>@lang('home.name')</label>
                                        <input type="text" class="form-control bg-transparent text-light @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" title="First and last name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('dashboard.phone')</label>
                                        <input type="text" class="form-control bg-transparent text-light @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('home.maping')</label>
                                        <textarea name="map" class="form-control bg-transparent text-light @error('map') is-invalid @enderror" rows="6" placeholder="@lang('home.maping')"></textarea>
                                        @error('map')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>@lang('home.chouse_file')</h3><br>
                                            <h5>@lang('home.multe_image')</h5>
                                            <h5>@lang('home.totle_price') : 
                                                @if (session()->has('coupon'))

                                                    {{ app()->getLocale() == 'ar' ? 'ج س' :  'SDG' }} : {{ Cart::subtotal() - session()->get('coupon') }}

                                                @else

                                                    {{ app()->getLocale() == 'ar' ? 'ج س' :  'SDG' }} : {{ Cart::subtotal() }}

                                                @endif
                                            </h5>
                                            
                                                <button class="btn btn-info btn-sm copy-here" style="cursor: pointer;">@lang('home.click_here') @lang('dashboard.bank_account') : {{ setting('bank_account') }}</button>

                                            <hr>
                                            <div class="form-group">
                                                <input type="file" name="image[]" multiple class="filestyle fileing bg-transparent @error('image') is-invalid @enderror" data-dragdrop="true" data-text="Find file" multiple="multiple" required="required">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row my-5">
                                        <div class="col-md-12">
                                            <button class="btn btn-danger btn-lg btn-block">@lang('dashboard.add')</button>
                                            <a href="/" class="btn btn-outline-danger btn-lg btn-block">@lang('dashboard.dashboard')</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /form card cc payment -->
                            
            </div>

        </section>
        
    @endif
	<!--end of contant payment-->


@endsection
