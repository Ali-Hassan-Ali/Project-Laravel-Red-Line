@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.supports'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.supports')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.supports')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.supports') <small>{{ $supports->total() }}</small></h3>

                    <form action="{{ route('dashboard.supports.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('supports_create'))
                                    <a href="{{ route('dashboard.supports.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($supports->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('home.first_name')</th>
                                    <th>@lang('home.last_name')</th>
                                    <th>@lang('dashboard.email')</th>
                                    <th>@lang('dashboard.phone')</th>
                                    <th>@lang('home.title')</th>
                                    <th>@lang('home.body')</th>
                                    <th>@lang('home.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($supports as $index=>$support)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $support->first_name }}</td>
                                        <td>{{ $support->last_name }}</td>
                                        <td>{{ $support->email }}</td>
                                        <td>{{ $support->phone }}</td>
                                        <td>{{ $support->title }}</td>
                                        <td>{{ $support->body }}</td>
                                        <td>{{ $support->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('supports_update'))
                                                <a href="{{ route('dashboard.supports.edit', $support->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('supports_delete'))
                                                <form action="{{ route('dashboard.supports.destroy', $support->id) }}" method="post" style="display: inline-block">
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
                            
                            {{ $supports->appends(request()->query())->links() }}
                            
                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
