@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.orders'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.orders')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}">@lang('dashboard.clients')</a></li>
                <li class="active">@lang('dashboard.orders')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    @if ($orders->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
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
                                        <div id="overlay"></div>
                                        <td>
                                            @foreach (json_decode($order->image) as $image)
                                                <img src="{{ asset('uploads/order_images/' . $image) }}" width="100" class="images">
                                            @endforeach
                                        </td>
                                        <td>{{ $order->totle_price }}</td>
                                        <td>{{ $order->map }}</td>
                                        <td>
                                            @if ($order->status == 1)
                                                <div class="btn btn-primary btn-sm">@lang('dashboard.active')</div>
                                            @else
                                                <div class="btn btn-info btn-sm">@lang('dashboard.unactive')</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.purchase.show',$order->id) }}" class="btn btn-danger btn-sm">
                                                @lang('dashboard.show') <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
