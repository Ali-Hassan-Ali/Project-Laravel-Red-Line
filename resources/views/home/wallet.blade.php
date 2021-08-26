@extends('layouts.home.app')

@section('content')

@section('title', __('home.cart').__('home.shoping'))

	<!--start  of contant section-->

	<div style="padding: 100px 100px">
        <h1 class="text-center text-white my-5 py-5">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.cart') <span class="text-danger">@lang('home.shoping')</span>
        </h1>
    </div>

    <!--end  of contant section-->

    <!--start of profile section-->

    @if (Cart::count() > 0)

    <section id="cart" class="text-white">
        <h1 class="text-center py-5 mb-5">@lang('home.products')</h1>
        <div class="container">

            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image">@lang('dashboard.image')</label>
                    <label class="product-details">@lang('home.product')</label>
                    <label class="product-price">@lang('home.price')</label>
                    <label class="product-quantity">@lang('home.quantity')</label>
                    <label class="product-removal">@lang('home.remove')</label>
                    <label class="product-line-price">@lang('home.total')</label>
                </div>

                @foreach (Cart::content() as $product)
                	
	                <div class="product" id="delete-cart-row-{{ $product->model->id }}">
	                    <div class="product-image">
	                        <img src="{{ $product->model->image_path }}">
	                    </div>
	                    <div class="product-details">
	                        <div class="product-title">{{ $product->model->name }}</div>
	                        <p class="product-description">{!! $product->model->description !!}</p>
	                    </div>
	                    <div class="product-price" id="pr-{{ $product->model->id }}">{{ number_format($product->model->exchange_rate,2) }}</div>
	                    <div class="product-quantity">
	                        <input type="number" data-price="{{ $product->model->exchange_rate }}" class="quantity" data-id="{{ $product->model->id }}" value="{{ $product->qty }}" min="1" max="{{ $product->model->quantity }}" 
                                    data-url="{{ route('wallet.update',$product->rowId) }}" data-method="put">
	                    </div>
	                    <div class="product-removal">
	                        <button class="btn btn-danger btn-sm removal-produc"
									data-url="{{ route('wallet.delete',$product->rowId) }}"
                					data-method="delete"	                        	
                    				data-id="{{ $product->id }}">
                    				<i class="fa fa-trash"></i>
                			</button>
	                    </div>
	                    <div class="new-price product-line-price-{{ $product->model->id }}">{{ app()->getLocale() == 'ar' ? 'ج س' :  'SDG' }} : {{ number_format($product->model->exchange_rate * $product->qty, 2) }}</div>
	                </div>

                @endforeach


                <div class="totals text-white">
                    <div class="totals-item totals-item-total">
                        {{-- <label>Grand Total</label> --}}
                        
                        @if (session()->has('coupon'))
                            
                            <label>@lang('home.old_total')</label>

                            <div class="totals-value" id="cart-total">

                                 {{ Cart::subtotal() }}

                            </div>

                            <label>@lang('home.new_total')</label>

                            <div class="totals-value">
                                {{ number_format(Cart::subtotal() - session()->get('coupon')) }}
                                 <form action="{{ route('coupon.delete') }}" method="delete" style="display:block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="text-danger delete-coupon mt-5"
                                        data-url="{{ route('coupon.delete') }}"
                                        data-method="delete"
                                    ><i class="fa fa-trash"></i></button>
                                 </form>
                            </div>

                        @else

                            <label>@lang('home.total')</label>

                            <div id="cart-total">{{ app()->getLocale() == 'ar' ? 'ج س' :  'SDG' }} : {{ Cart::subtotal() }}</div>

                        @endif

                    </div>
                    <!-- <div class="totals-item totals-item-total">
                        <form action="">
                            <input type="text" name="copun" placeholder="Enter Copun" class="form-control col-2 d-flix justify-content-start">
                        </form>
                    </div> -->
                    <div class="">
                        <div class="input-group d-flex justify-content-end">
                            @if (session()->has('coupon'))
                                


                            @else

                                <div class="input-group-prepend">
                                    <button class="btn btn-danger px-4 coupon-code"
                                            data-url="{{ route('coupon.store') }}"
                                            data-method="post">
                                            <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control col-12 col-md-3 bg-transparent text-light"
                                       name="coupon_code" placeholder="@lang('home.enter_coupon')">

                            @endif
                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <form action="">
                        <input type="text" hidden>
                        <input type="text" hidden>
                        <input type="text" hidden>
                            
                        @if (Cart::count() < 0)

                            @lang('home.send') <i class="fa fa-plus"></i>

                        @else
                        <a  href="{{ route('orders.index') }}" class="btn btn-outline-light col-12">
                            @auth

                                @lang('home.send') <i class="fa fa-plus"></i>
                                    
                            @else

                                @lang('home.no_auth') <i class="fa fa-plus"></i>

                            @endauth
                        </a>
                        @endif
                    </form>
                    <a href="{{ route('shop.show') }}" class="btn btn-danger col-12 my-2">@lang('home.shop') <i class="fa fa-cart-plus"></i></a>
                </div>

            </div>
        </div>
    </section>
        
    @else

        <div class="bg-dark py-5 my-5">
            
            <h2 class="text-white text-center">@lang('dashboard.no_data_found')</h2>

        </div>

    @endif


    <!--end of profile section-->
	
@endsection

@push('cart')
    
    <script>
        $(document).ready(function() {

            //calculate the total
            function calculateTotal() {

                var price = 0;

                $('.new-price').each(function(index) {
                    
                    price += parseFloat($(this).html().replace(/,/g, ''));

                });//end of product price

                $('#cart-total').html($.number(price, 2));

            }//end of calculate total

            $('body').on('keyup change', '.quantity', function() {

                var url      = $(this).data('url');
                var method   = $(this).data('method');
                var id       = $(this).data('id');
                var price    = $(this).data('price');
                var quantity = $(this).val();

                $('.product-line-price-'+id).html($.number(parseInt(quantity) * parseInt(price),2));
                calculateTotal();

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                      quantity:quantity,
                      id:id,
                    },
                    success: function (data) {

                    },//end of success

                });//this ajax

            });//end of product quantity change

            $(".coupon-code").click(function(e){
                e.preventDefault();

                var coupon_code = $("input[name=coupon_code]").val();
                var url         = $(this).data('url');
                var method      = $(this).data('method');

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                      coupon_code:coupon_code,
                    },
                    success: function (response) {
                        if (response.success == true) {

                            swal({
                                title: "@lang('home.sucss_coupon')",
                                type: "success",
                                icon: '{{ asset("home_files/images/success.png") }}',
                                buttons: false,
                                timer: 15000
                            }),

                            location.reload();

                        } else {

                            swal({
                                title: "@lang('home.error_coupon')",
                                type: "error",
                                icon: 'error',
                                buttons: false,
                                timer: 1500
                            })
                        
                        }//endof if

                    },//end of success

                });//this ajax

            });//coupon-code

            $(".delete-coupon").click(function(e){
                e.preventDefault();

                var url     = $(this).data('url');
                var method  = $(this).data('method');

                swal({
                    title: "@lang('dashboard.confirm_delete')",
                    type: "error",
                    icon: "warning",
                    buttons: {cancel: "@lang('dashboard.no')",defeat:"@lang('dashboard.yes')"},
                    dangerMode: true
                })

                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: url,
                            method: method,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function(data) {
                                
                                if (data.success == true) {

                                    swal({
                                        title: "@lang('dashboard.deleted_successfully')",
                                        type: "success",
                                        icon: '{{ asset("home_files/images/success.png") }}',
                                        buttons: false,
                                        timer: 15000
                                    }),

                                    location.reload();

                                }
                            },
                        });//this ajax 
                    }; //end of if
                });//then

                
            });//delete-coupon

            $('.removal-produc').click( function() {
                
                var url     = $(this).data('url');
	            var method  = $(this).data('method');
	            var id      = $(this).data('id');
                var cart    = {{ Cart::count() }};

                swal({
                    title: "@lang('dashboard.confirm_delete')",
                    type: "error",
                    icon: "warning",
                    buttons: {cancel: "@lang('dashboard.no')",defeat:"@lang('dashboard.yes')"},
                    dangerMode: true
                })

                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        method: method,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(data) {

                            if (data.success == true) {

                                $('#delete-cart-row-'+id).remove();

                            }

                            calculateTotal();

                            if (cart == 0) {

                                location.reload();

                            }   

                            swal({
                                title: "@lang('dashboard.deleted_successfully')",
                                type: "success",
                                icon: '{{ asset("home_files/images/success.png") }}',
                                buttons: false,
                                timer: 15000
                            });//end of swal

                        },//end of success

                    });//this ajax 

                    }; //end of if
                });//then

            });//end of product-removal button

        });//end of document).ready
    </script>

@endpush