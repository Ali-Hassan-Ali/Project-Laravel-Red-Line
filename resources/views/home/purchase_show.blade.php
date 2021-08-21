@extends('layouts.home.app')

@section('content')

@section('title', __('home.purchase'))

<!--start of purchase section-->

    <div style="padding: 100px 100px">
        <h1 class="text-center text-white">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> /
            <a href="{{ route('purchase.index') }}" class="text-danger">@lang('home.purchase')</a> /
            <span class="text-danger">@lang('home.products')</span>
        </h1>
    </div>

<!--end of purchase section-->

<!--start of profile section-->

    @if ($purchases->count() == 0)
        
        <div class="bg-dark py-5 my-5">
            
            <h2 class="text-center text-white">@lang('dashboard.no_data_found')</h2>

        </div>
        
    @else

    	<section id="profile" class="text-white pb-5">
            <h1 class="text-center py-5">@lang('home.products')</h1>
            <div class="container mb-5">
                {{-- <div class="mb-4 py-2 px-0 p-md-2 col-12 bg-danger border-10 d-flex justify-content-around">
                    <div class="btn btn-light d-flix align-items-center align-self-center"><small>Totle-Price : 400$</small></div>
                    <div class="btn btn-light d-flix align-items-center align-self-center">Totle : 400$</div>
                    <div class="btn btn-light d-flix align-items-center align-self-center">Decound : 400$</div>
                </div> --}}
                <table class="table table-hover border-tabil">
                    <thead>
                        <tr class="bg-danger text-light">
                            <th>#</th>
                            <th>@lang('dashboard.name')</th>
                            <th>@lang('dashboard.image')</th>
                            <th>@lang('dashboard.description')</th>
                            <th>@lang('dashboard.price')</th>
                            <th>@lang('dashboard.quantity')</th>
                        </tr>
                    </thead>
                    <tbody>

                    	@foreach ($purchases as $index=>$purchase)
                    		
    	                    <tr>
    	                        <td>{{ $index + 1 }}</td>
    	                        <td>{{ $purchase->product->name }}</td>
                                <div id="overlay"></div>
    	                        <td><img data-enlargeable width="100" style="cursor: zoom-in" src="{{ $purchase->product->image_path }}" width="100" class="images"></td>
                                <td>{{ $purchase->product->description }}</td>
    	                        <td>{{ $purchase->product->price }}</td>
    	                        <td>{{ $purchase->quantity }}</td>
    	                    </tr>

                    	@endforeach

                    </tbody>
                </table>

            </div>
        </section>

    @endif
<!--end of profile section-->

@endsection