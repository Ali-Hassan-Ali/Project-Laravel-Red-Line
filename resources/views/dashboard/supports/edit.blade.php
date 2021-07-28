@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.supports')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.supports')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.supports.index') }}"> @lang('dashboard.supports')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.supports.update',$support->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('home.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $support->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('home.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $support->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $support->email }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.phone')</label>
                            <input type="phone" name="phone" class="form-control" value="{{ $support->phone }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ $support->title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('home.body')</label>
                            <input type="text" name="body" class="form-control" value="{{ $support->body }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
