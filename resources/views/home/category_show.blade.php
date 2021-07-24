@extends('layouts.home.app')

@section('content')

@section('title', __('home.categoriy') .' - '.  __($category_name->name))

	<div class="mt-3 pb-1"></div>

	<section id="Owl-Product">

        <h2 class="text-center text-white mb-5" style="padding-top: 100px;">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.categoriy') 
            <span class="text-danger">{{ $category_name->name }}</span>
        </h2>
    
        <div class="mb-5 row d-flex align-items-center justify-content-center">
        	
	    	@foreach ($products as $product)
	    		
	            <div class="item image-product">
	                <img src="{{ $product->image_path }}" class="imgBx" alt="" height="320">
	                <div class="item__details mx-auto">
	                    <div class="row">
	                        <div class="btn btn-danger col-md-12 mb-2 add-cart" style="cursor: pointer;" 
	                            data-url="{{ route('wallet.store',$product->id) }}"
	                            data-method="post">
	                            <i class="fa fa-cart-plus"></i> @lang('home.add_card')
	                        </div>
	                        <a href="{{ route('show',$product->id) }}" class="btn btn-outline-light mb-2 col-md-12">
	                            <i class="fa fa-eye"></i> @lang('home.show_product')
	                        </a>
	                        <div class="btn btn-danger col-md-12 mb-2" style="cursor: pointer;">
                                @for ($i = 0; $i < $product->stars; $i++)
                                    <i class="fa fa-star" style="color: #ffe066;"></i>
                                @endfor
                            </div>
	                    </div>
	                </div>
	            </div>

	    	@endforeach

	    </div>
            <!-- end of row -->

    </section>

@endsection