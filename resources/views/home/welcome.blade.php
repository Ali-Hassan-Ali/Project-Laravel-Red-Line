@extends('layouts.home.app')

@section('content')

@section('title', __('home.home'))

	<!--start of slider section-->
    <section id="slider">
        <div class="bg_slider mt-5">
            <img src="{{ asset('home_files/images/bg-slider.jpg') }}" class="slider" alt="" width="100%" style="border-radius: 0px;">
        </div>
    </section>
    <!--end of slider section-->


    <!--start of text section-->
    <section class="py-3 text-center">
        <p class="anmation-color font-weight-bold fw-500 wow flash text-danger" data-wow-duration="4s" data-wow-offset="0">Lorem ipsum dolor sit amet autem beatae nulla in.</p>
    </section>
    <!--end of text section-->
    

    <!--start of OwlCarouse section-->
    <section id="OwlCarouse">

        <h2 class="text-center text-white mb-5">@lang('home.category') <span class="text-danger">@lang('home.shoping')</span></h2>

        @foreach ($categories as $category)
            
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
                
        <div class="container d-flex justify-content-center pt-5">
            <a href="./AllCategory.html" class="btn btn-outline-light btn-sm flash" data-wow-duration="4s" data-wow-offset="0">All Category</a>
        </div>

    </section>
    <!--end of OwlCarouse section-->

    <section id="service" class="text-white bg-dark py-5">
        <h2 class="text-center pb-4 ser wow flash" data-wow-duration="4s" data-wow-offset="0">Our <span class="text-danger">Services</span></h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInLeft" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger ali">
                        <div class="card-body">
                            <i class="fa fa-viadeo icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Occasions</h4>
                            <p>For what reason would it be advisable for me to think about business content?</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInUp" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger">
                        <div class="card-body"><i class="fa fa-handshake-o icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Social Activity</h4>
                            <p>For what reason would it be advisable for me to think about business content?</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInRight" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger">
                        <div class="card-body"><i class="fa fa-truck icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Wholesale Sale</h4>
                            <p>For what reason would it be advisable for me to think about business content?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="image">
        <div class="container pb-5 wow bounce" data-wow-duration="2s" data-wow-offset="0">
            <h2 class="text-center text-light py-5 wow flash" data-wow-duration="4s" data-wow-offset="0">image <span class="text-danger">privew</span></h2>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/001.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/001.jpg') }}" class="image-gallery" width="200">
                <!-- <i class="fa fa-home icon-image"></i> -->
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/002.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/002.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/004.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/004.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/005.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/005.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/006.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/006.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/001.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/001.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/002.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/002.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/004.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/004.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/005.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/005.jpg') }}" class="image-gallery" width="200">
            </a>

            <a data-fancybox="gallery" class="m-2 hovering" href="{{ asset('home_files/images/demo/006.jpg') }}" data-caption="My caption">
                <img src="{{ asset('home_files/images/demo/006.jpg') }}" class="image-gallery" width="200">
            </a>


        </div>
    </section>

    <section id="support" class="text-white bg-dark py-5">
        <div class="container">
            <h2 class="text-center text-light wow flash" data-wow-duration="4s" data-wow-offset="0">technical <span class="text-danger">support</span></h2>

            <div class="py-5 wow bounceInUp" data-wow-duration="2s" data-wow-offset="0">
                <form>
                    <div class="form-row">
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" class="form-control bg-transparent text-light" placeholder="Enter First Name">
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" class="form-control bg-transparent text-light" placeholder="Enter Last Name">
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" class="form-control bg-transparent text-light" placeholder="Enter Email">
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" class="form-control bg-transparent text-light" placeholder="Enter Phone">
                        </div>
                        <div class="col-12 my-3">
                            <input type="text" class="form-control bg-transparent text-light" placeholder="Enter Title">
                        </div>
                        <div class="col-12 my-3 col-md-12">
                            <div class="form-group">
                                <textarea class="form-control bg-transparent text-light" rows="3" placeholder="Enter Body"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-danger mb-2 d-block col-12">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection