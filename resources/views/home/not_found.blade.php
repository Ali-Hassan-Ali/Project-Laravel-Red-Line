@extends('layouts.home.app')

@section('content')

@section('title', __('dashboard.no_data_found'))

	<!--start of contant section-->

	<div style="padding: 100px 100px" class="my-5">
        <h1 class="text-center text-white my-5">
            <a href="/" class="text-danger">
            	<i class="fa fa-home"></i>
           	</a> /
        	<span class="text-white">@lang('dashboard.no_data_found')</span>
        </h1>
    </div>

	<!--end  of contant section-->
	
	<!--start of profile section-->

    <section class="text-white bg-dark">

        <div class="container py-5">
       		<h1 class="text-center text-danger py-5">@lang('dashboard.no_data_found')</h1>
        </div>
        
    </section>

	<!--end  of profile section-->

@endsection