@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.orders'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.orders')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.orders')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.orders') <small>{{ $orders->count() }}</small></h3>

                    <form action="{{ route('dashboard.orders.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($orders->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.phone')</th>
                                    <th>@lang('dashboard.description')</th>
                                    <th>@lang('dashboard.image')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($orders as $index=>$order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>
                                            <a href="tel:{{ $order->phone }}">{{ $order->phone }}</a>
                                        </td>
                                        <td>{{ $order->map }}</td>
                                        <td>
                                            @foreach (json_decode($order->image) as $image)
                                                <img data-enlargeable width="100" style="cursor: zoom-in" src="{{ asset('uploads/order_images/' . $image) }}" width="100" class="images">
                                            @endforeach
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('dashboard.show')</a>
                                            @if ($order->status == '0')

                                                <form action="{{ route('dashboard.orders.status', $order->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('put') }}
                                                    <input type="text" hidden name="status" value="1">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-toggle-off"></i></button>
                                                </form><!-- end of form -->
                                                
                                            @else

                                                <form action="{{ route('dashboard.orders.status', $order->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('put') }}
                                                    <input type="text" hidden name="status" value="0">
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-toggle-on"></i> </button>
                                                </form><!-- end of form -->

                                            @endif
                                            @if (auth()->user()->hasPermission('orders_update'))
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('orders_delete'))
                                                <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                                </form><!-- end of form -->
                                            @else
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                            @endif
                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{ $orders->appends(request()->query())->links() }}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
