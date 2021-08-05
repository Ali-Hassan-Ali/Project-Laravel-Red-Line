@extends('layouts.home.app')

@section('content')

@section('title', __('home.show_product'))

	<!--start of contant section-->

    <div style="padding: 120px 0px 95px 0px">
        <h1 class="text-center text-white m-0">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.show') <span class="text-danger">@lang('home.product')</span>
        </h1>
    </div>

	<!--end of contant section-->

	<!--start of contant product-->

    <section id="product" class="bg-danger py-5">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $product->image_path }}" class="imgBx" alt="" style="width: 100%;">
                    </div>
                    <div class="col-md-4 text-white">
                        <h4 class="text-dark mt-sm-5 mt-md-0 mt-3 mt-md-0">{{ $product->name }}</h4>
                        <p>
                            {!! $product->description !!}
                        </p>
                        <table>
                            <tbody>
                                <tr>
                                    <th>
                                        <h5>Name </h5>
                                    </th>
                                    <th>Teshert</th>
                                </tr>
                                <tr>
                                    <th>
                                        <h5>Size </h5>
                                    </th>
                                    <th>xx-larg</th>
                                </tr>
                                <tr>
                                    <th>
                                        <h5>Color </h5>
                                    </th>
                                    <th>white</th>
                                </tr>
                                <tr>
                                    <th>
                                        <h5>sals</h5>
                                    </th>
                                    <th>$70</th>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-4 mb-5 pb-5 mb-md-0 pb-md-0 d-flex align-items-baseline" style="border: 1px solid #fff;">
                        
                        <div class="row mx-1 mb-5 pb-5 mb-md-0 pb-md-0 d-flex align-items-baseline">

                            <div class="btn btn-outline-light mb-2 add-cart col-12" style="cursor: pointer; margin-top: 100px;" 
                                data-url="{{ route('wallet.store',$product->id) }}"
                                data-method="post">
                                <i class="fa fa-cart-plus"></i> @lang('home.add_card')
                            </div>

                            <a href="{{ route('shop.show') }}" class="btn btn-light hvr-pop col-12">
                                <i class="fa fa-cart-plus"></i> @lang('home.shop')
                            </a>

                            <div class="btn btn-light hvr-pop col-12 mt-2">
                                @for ($i = 0; $i < $product->stars; $i++)
                                    <i class="fa fa-star" style="color: #ffe066;"></i>
                                @endfor
                            </div>

                        </div>

                    </div>
                    <!--      end of col md 8-->
                </div>
                <!--        end of row-->
            </div>
        </div>
        <!--    end of container-->
    </section>

	<!--end of contant product-->

    
    <!--start of contant product-->

    <section id="OwlCarouse">

        <h2 class="text-center text-white mb-5">@lang('home.best') <span class="text-danger">@lang('home.products')</span></h2>
        
            
            <div class="owl-carousel owl-category mb-5">

            @foreach ($reand_product as $product)
                
                <div class="item">
                    <img src="{{ $product->image_path }}" class="imgBx" alt="" height="320">
                    <div class="item__details">
                        <div class="row">
                            <a href="{{ route('show',$product->id) }}" class="btn btn-danger col-md-12 mb-2">
                                <i class="fa fa-cart-plus"></i> @lang('home.add_card')
                            </a>
                            <a href="{{ route('show',$product->id) }}" class="btn btn-outline-light col-md-12">
                                <i class="fa fa-eye"></i> @lang('home.show_product')
                            </a>
                            <div class="btn btn-danger col-md-12 mt-2" style="cursor: pointer;">
                                @for ($i = 0; $i < $product->stars; $i++)
                                    <i class="fa fa-star" style="color: #ffe066;"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>


        <div class="container d-flex justify-content-center pt-5">
            <a href="{{ route('all_category') }}" class="btn btn-outline-light btn-sm flash" data-wow-duration="4s" data-wow-offset="0">
                @lang('home.all_category')
            </a>
        </div>
    </section>

    <!--end of contant product-->


@endsection
