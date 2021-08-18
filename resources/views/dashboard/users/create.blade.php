@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.users')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> @lang('dashboard.users')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>@lang('dashboard.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/user_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['users','categoreys','products','clients','orders','cupons','supports','gallerys','payments','settings'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('dashboard.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        @if ($model == 'settings')
                                            @php
                                                $maps = ['read'];
                                            @endphp
                                        @endif

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{ $model . '_' . $map }}"> @lang('dashboard.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
