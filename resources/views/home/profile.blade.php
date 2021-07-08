@extends('layouts.home.app')

@section('content')

@section('title', __('home.profile'))

	<!--start of contant section-->

	<div style="padding: 100px 100px">
        <h1 class="text-center text-white">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.profile') <span class="text-danger">@lang('home.user')</span>
        </h1>
    </div>

	<!--end  of contant section-->
	
	<!--start of profile section-->

    <section id="profile" class="text-white">
        <h1 class="text-center py-5 mb-5">@lang('home.edit_acount')</h1>
        <div class="container">
        	<form action="{{ route('update_prfile',auth()->user()->id ) }}" method="post" enctype="multipart/form-data">
	         	
	         	{{ csrf_field() }}
                {{ method_field('put') }}

	            <div class="d-flex justify-content-center">
	                <div id="profile-container">
	                    {{-- <image id="profileImage" src="http://lorempixel.com/100/100" /> --}}
	                    <image id="profileImage" src="{{ $user->image_path }}"/>
	                </div>
	                <input id="imageUpload" type="file" name="image" placeholder="Photo" capture>
	            </div>
	            <div class="d-flex justify-content-center pb-5">

	                <div class="col-12 mt-5 col-md-6">
	                    <div class="form-group">
	                        <input type="text" name="name" value="{{ $user->name }}" class="form-control border-input-10 bg-transparent text-light @error('name') is-invalid @enderror" 
	                        placeholder="@lang('home.enter_name')">
	                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>

	                    <div class="form-group pt-4">
	                        <input type="email" name="email" value="{{ $user->email }}" class="form-control border-input-10 bg-transparent text-light @error('email') is-invalid @enderror" placeholder="@lang('home.enter_email')">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>

	                    <div class="form-group pt-4">
	                        <h5>Change Passsword</h5>
	                    </div>

	                    <div class="form-group pt-4">
	                        <button type="submit" class="btn btn-danger col-12">@lang('home.update')</button>
	                    </div>
	                </div>

	            </div>

        	</form>
        </div>
        {{-- end of container --}}
    </section>

	<!--end  of profile section-->

@endsection