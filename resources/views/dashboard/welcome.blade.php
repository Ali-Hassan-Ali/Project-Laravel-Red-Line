@extends('layouts.dashboard.app')

@section('content')

@section('title', __('home.dashboard'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $categorys_count }}</h3>

                            <p>@lang('dashboard.categorey')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.categoreys.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--products--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $products_count }}</h3>

                            <p>@lang('dashboard.products')</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                        <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--clients--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $clients_count }}</h3>

                            <p>@lang('dashboard.clients')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--users--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $admins_count }}</h3>

                            <p>@lang('dashboard.users')</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->

            <div class="row">

                {{-- cupons--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $cupons_count }}</h3>

                            <p>@lang('dashboard.cupons')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gift"></i>
                        </div>
                        <a href="{{ route('dashboard.cupons.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--products--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $orders_active }}</h3>

                            <p>@lang('dashboard.orders_active')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sort-amount-up-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.orders.index',['status'=> 1]) }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--clients--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $orders_unactive }}</h3>

                            <p>@lang('dashboard.orders_inactive')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sort-amount-down-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.orders.index',['status'=> 0]) }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--users--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $supports_count }}</h3>

                            <p>@lang('dashboard.orders')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('dashboard.orders.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->

            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.sales_graph')</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
                <!-- /.box-body -->
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('welcome')
    
    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('home.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush