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

                    @if ($purchases->count() > 0)

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
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($purchases as $index=>$purchase)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $purchase->product->name }}</td>
                                        <div id="overlay"></div>
                                        <td><img src="{{ $purchase->product->image_path }}" width="100" class="images"></td>
                                        <td>{{ $purchase->product->description }}</td>
                                        <td>{{ $purchase->product->price }}</td>
                                        <td>{{ $purchase->quantity }}</td>
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
