@extends('layouts.home.app')

@section('content')

@section('title', __('home.all_category'))
	
	    <!--start of OwlCarouse section-->
    <section id="OwlCarouse">

        <h2 class="text-center text-white my-5 my-5">
        	<a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.all') 
        	<span class="text-danger">@lang('home.category')</span>
        </h2>

        @foreach (App\Models\Categorey::all() as $category)
            
            <div class="row text-white justify-content-between category__name">
                <h4 class="mr-sm-0 ml-5 pl-5">{{ $category->name }}</h4>
                <a href="{{ route('category.show',$category->id ) }}" class="mr-5 mr-5 text-danger align-self-center">@lang('home.see_all')</a>
            </div>

            <div class="owl-carousel owl-category mb-5 wow lightSpeedIn" data-wow-duration="4s" data-wow-offset="0">
                
            @foreach ($category->proudut as $product)
                <div class="item">
                    <img src="{{ $product->image_path }}" class="imgBx" alt="" height="320">
                    <div class="item__details">
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

        @endforeach

    </section>
    <!--end of OwlCarouse section-->

@endsection