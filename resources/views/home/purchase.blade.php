@extends('layouts.home.app')

@section('content')

@section('title', __('home.purchase'))

<!--start of purchase section-->

    <div style="padding: 100px 100px">
        <h1 class="text-center text-white">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.page') 
            <span class="text-danger">@lang('home.purchase')</span>
        </h1>
    </div>

<!--end of purchase section-->

<!--start of profile section-->

    @if ($orders->count() == 0)
        
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
            <table class="table table-hover border-tabil table-sm table-responsive-md">
                <thead>
                    <tr class="bg-danger text-light">
                        <th>#</th> 
                        <th>@lang('dashboard.name')</th>
                        <th>@lang('dashboard.phone')</th>
                        <th>@lang('dashboard.image')</th>
                        <th>@lang('home.total')</th>
                        <th>@lang('dashboard.description')</th>
                        <th>@lang('dashboard.status')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>

                	@foreach ($orders as $index=>$order)
                            
	                    <tr>
	                        <td>{{ $index + 1 }}</td>
	                        <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>
                                @foreach (json_decode($order->image) as $image)
                                    <img data-enlargeable width="100" style="cursor: zoom-in" src="{{ asset('uploads/order_images/' . $image) }}" width="100" class="images">
                                @endforeach
                            </td>
	                        <td>{{ $order->total_price }}</td>
	                        <td>{{ $order->map }}</td>
                            <td>
                                @if ($order->status == 1)
                                    <div class="btn btn-success btn-sm">
                                        @lang('dashboard.active')
                                    </div>
                                @else
                                    <div class="btn btn-info btn-sm">
                                        @lang('dashboard.unactive') 
                                        <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('purchase.show',$order->id) }}" class="btn btn-danger btn-sm">
                                    @lang('dashboard.show') <i class="fa fa-eye"></i>
                                </a>
                            </td>
	                    </tr>

                	@endforeach

                </tbody>
            </table>

        </div>
    </section>

    @endif
<!--end of profile section-->

@endsection