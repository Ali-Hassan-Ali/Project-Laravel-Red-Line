@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.products'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.orders.index') }}"> @lang('dashboard.orders')</a></li>
                <li class="active">@lang('dashboard.products')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.products') <small>{{ $orders->count() }}</small></h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($orders->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.image')</th>
                                    <th>@lang('dashboard.description')</th>
                                    <th>@lang('dashboard.price')</th>
                                    <th>@lang('dashboard.quantity')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($orders as $index=>$order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td><img data-enlargeable width="100" style="cursor: zoom-in" src="{{ $order->product->image_path }}" width="100"></td>
                                        <td>{{ $order->product->description }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->created_at }}</td>
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