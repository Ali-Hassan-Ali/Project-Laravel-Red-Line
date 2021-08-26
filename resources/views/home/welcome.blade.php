@extends('layouts.home.app')

@section('content')

@section('title', __('home.home'))

	<!--start of slider section-->

    <section id="slider">
        <div class="bg_slider mt-5">
            <img src="{{ asset('home_files/images/bg-slider.jpg') }}" class="slider" alt="welcome" width="100%" style="border-radius: 0px;">
        </div>
    </section>

    <!--end of slider section-->

    <!--start of text section-->

    <section class="py-3 text-center">
        <p class="anmation-color font-weight-bold fw-500 wow flash text-danger" data-wow-duration="4s" data-wow-offset="0">
            {{ app()->getLocale() == 'ar' ?  setting('about_ar') : setting('about_en') }}
        </p>
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

            <div class="owl-carousel owl-category mb-5 wow flash" data-wow-duration="4s" data-wow-offset="0">
                
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
            <a href="{{ route('all_category') }}" class="btn btn-outline-light btn-sm flash" data-wow-duration="4s" data-wow-offset="0">
                @lang('home.all_category')
            </a>
        </div>

    </section>
    <!--end of OwlCarouse section-->

    <!--end of service section-->
    
    <section id="service" class="text-white bg-dark py-5">
        <h2 class="text-center pb-4 pb-5 ser wow flash" data-wow-duration="4s" data-wow-offset="0">@lang('home.our') <span class="text-danger">@lang('home.services')</span></h2>
        <div class="container">
            <div class="row pt-4">
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInLeft" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger ali">
                        <div class="card-body">
                            <i class="fa fa-viadeo icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">@lang('home.occasions')</h4>
                            <p>{{ app()->getLocale() == 'ar' ?  setting('occasions_ar') : setting('occasions_en') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInUp" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger">
                        <div class="card-body"><i class="fa fa-handshake-o icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">@lang('home.customer_order')</h4>
                            <p>{{ app()->getLocale() == 'ar' ?  setting('customer_order_ar') : setting('customer_order_en') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 hvr-grow-shadow wow bounceInRight" data-wow-duration="2s" data-wow-offset="0">
                    <div class="card border-0 shadow rounded-xs pt-5 bg-danger">
                        <div class="card-body"><i class="fa fa-truck icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">@lang('home.delivery')</h4>
                            <p>{{ app()->getLocale() == 'ar' ?  setting('delivery_ar') : setting('delivery_en') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--end of service section-->

    <!--start of image section-->

    <section id="image">
        <div class="container pb-5 wow bounce" data-wow-duration="2s" data-wow-offset="0">

            <h2 class="text-center text-light py-5 wow flash" data-wow-duration="4s" data-wow-offset="0">@lang('home.gallery') 
                <span class="text-danger">@lang('home.photo')</span>
            </h2>

            @if ($gallerys->count() > 0)
                
                @foreach ($gallerys as $gallery)
                    
                    <a data-fancybox="gallery" class="m-2 hovering" href="{{ $gallery->gallery_path }}" data-caption="{{ $gallery->title }}">
                        <img src="{{ $gallery->gallery_path }}" class="image-gallery" width="200">
                    </a>

                @endforeach

            @else

                <h2 class="text-light text-center">@lang('dashboard.no_data_found')</h2>

            @endif

        </div>
    </section>

    <!--end of image section-->
    
    <!--start of support section-->

    <section id="support" class="text-white bg-dark py-5">
        <div class="container">
            <h2 class="text-center text-light wow flash" data-wow-duration="4s" data-wow-offset="0">@lang('home.connect') 
                <span class="text-danger">@lang('home.us')</span>
            </h2>

            <div class="py-5 wow bounceInUp" data-wow-duration="2s" data-wow-offset="0">
                <form>
                    <div class="form-row">
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" name="first_name" id="first_name" class="form-control bg-transparent text-light" placeholder="@lang('home.first_name')">
                            <span class="text-danger" id="first_name-error"></span>
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="text" name="last_name" id="last_name" class="form-control bg-transparent text-light" placeholder="@lang('home.last_name')">
                            <span class="text-danger" id="last_name-error"></span>
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="number" name="phone" id="phone" class="form-control bg-transparent text-light" placeholder="@lang('dashboard.phone')">
                            <span class="text-danger" id="phone-error"></span>
                        </div>
                        <div class="col-12 my-3 col-md-6">
                            <input type="email" name="email" id="email" class="form-control bg-transparent text-light" placeholder="@lang('dashboard.email')">
                            <span class="text-danger" id="email-error"></span>
                        </div>
                        <div class="col-12 my-3">
                            <input type="text" name="title" id="title" class="form-control bg-transparent text-light" placeholder="@lang('home.title')">
                            <span class="text-danger" id="title-error"></span>
                        </div>
                        <div class="col-12 my-3 col-md-12">
                            <div class="form-group">
                                <textarea id="body" name="body" class="form-control bg-transparent text-light" rows="3" placeholder="@lang('home.body')"></textarea>
                                <span class="text-danger" id="body-error"></span>
                            </div>
                        </div>
                        <button class="btn btn-danger mb-2 d-block col-12 add-suport"
                                data-url="{{ route('store.connect') }}"
                                data-method="post"
                        >@lang('home.send')</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--start of support section-->

@endsection

@push('welcome')
    
    <script>
        $(document).ready(function() {  

            $(".add-suport").click(function(e){
                e.preventDefault();

                var url     = $(this).data('url');
                var method  = $(this).data('method');

                var fName   = $('#first_name').val();
                var lName   = $('#last_name').val();
                var phone   = $('#phone').val();
                var email   = $('#email').val();
                var title   = $('#title').val();
                var body    = $('#body').val();
                var items   = ['first_name','last_name','phone','email','title','body'];

                items.forEach(function(item){   
                  
                    $('#' + item + '').removeClass('is-invalid');
                    $('#' + item + '-error').text('');

                });

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        first_name: fName,
                        last_name: lName,
                        phone: phone,
                        email: email,
                        title: title,
                        body: body,
                    },
                    success: function(data) {

                        if (data.success == true) {

                            items.forEach(function(item){

                                $('#' + item + '').val('');

                            });

                            swal({
                                title: "@lang('dashboard.added_successfully')",
                                type: "success",
                                icon: "{{ asset('home_files/images/success.png') }}",
                                buttons: false,
                                timer: 1500
                            }); //end of  swal

                        } //end of if

                    }, 
                    error: function(data) {

                        $.each(data.responseJSON.errors, function(name,message) {

                            $('#' + name + '').addClass('is-invalid');

                            $('#' + name + '-error').text(message);

                        });//end of each

                    },//end of error

                });//end of ajax

            });//end of click

        });//end of document ready
    </script>

@endpush