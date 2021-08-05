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

    <section id="payment" class="bg-danger py-5">
        
        <div class="container">

            <div class="col-md-8 offset-md-3">
                    <span class="anchor" id="formPayment"></span>
                    <hr class="my-5">

                    <!-- form card cc payment -->
                    <div class="card card-outline-secondary d-flex justify-content-center">
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
                            <form class="form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>@lang('home.name')</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" title="First and last name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>@lang('dashboard.phone')</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->phone }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label>@lang('home.maping')</label>
                                    <textarea id="our-body" name="body" class="form-control" rows="4" placeholder="@lang('home.maping')"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>@lang('home.chouse_file')</h3>
                                        <hr>
                                        <div class="form-group">
                                            <input type="file" class="filestyle" data-dragdrop="true" data-text="Find file" multiple="multiple" data-older="fdf">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card cc payment -->
                        
        </div>

    </section>

	<!--end of contant payment-->


@endsection
