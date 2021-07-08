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
                        <img src="{{ $products->image_path }}" class="imgBx" alt="" style="width: 100%;">
                    </div>
                    <div class="col-md-8 text-white">
                        <h4 class="text-dark mt-sm-5 mt-md-0">{{ $products->name }}</h4>
                        <p>
                            {!! $products->description !!}
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

                        <div class="row mt-5 container">

                            <form action="">
                                <input type="number" name="" hidden="">
                                <input type="number" name="" hidden="">
                                <a href="./cart.html" class="btn btn-outline-light"><i class="fa fa-cart-plus"></i> Add Cart</a>
                            </form>

                            <a href="./AllCategory.html" class="btn btn-light ml-2">Shop</a>
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

        <h2 class="text-center text-white mb-5">Category <span class="text-danger">Shoping</span></h2>
        
            
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
                        </div>
                    </div>
                </div>

            @endforeach

            </div>


        <div class="container d-flex justify-content-center pt-5">
            <a href="./AllCategory.html" class="btn btn-outline-light btn-sm">All Category</a>
        </div>
    </section>

    <!--end of contant product-->


@endsection
