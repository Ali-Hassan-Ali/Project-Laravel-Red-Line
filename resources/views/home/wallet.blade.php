@extends('layouts.home.app')

@section('content')

@section('title', __('home.cart').__('home.shoping'))

	<!--start  of contant section-->

	<div style="padding: 100px 100px">
        <h1 class="text-center text-white">
            <a href="/" class="text-danger"><i class="fa fa-home"></i></a> / @lang('home.cart') <span class="text-danger">@lang('home.shoping')</span>
        </h1>
    </div>

    <!--end  of contant section-->

    <!--start of profile section-->

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
                	
	                <div class="product" id="delete-cart-row{{ $product->model->id }}">
	                    <div class="product-image">
	                        <img src="{{ $product->model->image_path }}">
	                    </div>
	                    <div class="product-details">
	                        <div class="product-title">{{ $product->model->name }}</div>
	                        <p class="product-description">{{ $product->model->description }}</p>
	                    </div>
	                    <div class="product-price">{{ $product->model->price }}</div>
	                    <div class="product-quantity">
	                        <input type="number" value="{{ $product->qty }}" min="1">
	                    </div>
	                    <div class="product-removal">
	                        <button class="btn btn-danger btn-sm"
									data-url="{{ route('wallet.delete',$product->rowId) }}"
                					data-method="delete"	                        	
                    				data-id="{{ $product->id }}">
                    				<i class="fa fa-trash"></i>
                			</button>
	                    </div>
	                    <div class="product-line-price">{{ $product->price * $product->qty }}</div>
	                </div>

                @endforeach


                <div class="totals text-white">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal">71.97</div>
                    </div>
                    <div class="totals-item">
                        <label>Tax (5%)</label>
                        <div class="totals-value" id="cart-tax">3.60</div>
                    </div>
                    <div class="totals-item">
                        <label>Shipping</label>
                        <div class="totals-value" id="cart-shipping">15.00</div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">{{ Cart::subtotal() }}</div>
                    </div>
                    <!-- <div class="totals-item totals-item-total">
                        <form action="">
                            <input type="text" name="copun" placeholder="Enter Copun" class="form-control col-2 d-flix justify-content-start">
                        </form>
                    </div> -->
                    <div class="">
                        <div class="input-group d-flex justify-content-end">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger px-4"><i class="fa fa-plus"></i></button>
                            </div>
                            <input type="text" class="form-control col-12 col-md-3 bg-transparent text-light" placeholder="Enter Coupn">
                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <form action="">
                        <input type="text" hidden>
                        <input type="text" hidden>
                        <input type="text" hidden>
                        <button class="btn btn-outline-light col-12">Add <i class="fa fa-plus"></i></button>
                    </form>
                    <a href="{{ route('shop.show') }}" class="btn btn-danger col-12 my-2">@lang('home.shop') <i class="fa fa-cart-plus"></i></a>
                </div>

            </div>
        </div>
    </section>

    <!--end of profile section-->
	
@endsection

@push('cart')
    
    <script>
        $(document).ready(function() {

            /* Set rates + misc */
            var taxRate = 0.05;
            var shippingRate = 15.00;
            var fadeTime = 300;


            /* Assign actions */
            $('.product-quantity input').change(function() {
                updateQuantity(this);
            });

            $('.product-removal button').click(function() {

                var url     = $(this).data('url');
	            var method  = $(this).data('method');
	            var id      = $(this).data('id');

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
	                        $('#delete-cart-row'+id).remove();
	                        swal({
	                            title: "@lang('dashboard.deleted_successfully')",
	                            type: "success",
	                            icon: '{{ asset("home_files/images/success.png") }}',
	                            buttons: false,
	                            timer: 15000
	                        }),
	                        removeItem(this);

                            $('#proudut-'+id).remove();
	                    },
	                    error: function(data) {

	                        swal({
	                            title: 'Opps...',
	                            text: data.message,
	                            type: 'error',
	                            timer: '1500'
	                        })

	                    },
	                });//this ajax 
	                }; //end of if
	            });//then

            });


            /* Recalculate cart */
            function recalculateCart() {
                var subtotal = 0;

                /* Sum up row totals */
                $('.product').each(function() {
                    subtotal += parseFloat($(this).children('.product-line-price').text());
                });

                /* Calculate totals */
                var tax = subtotal * taxRate;
                var shipping = (subtotal > 0 ? shippingRate : 0);
                var total = subtotal + tax + shipping;

                /* Update totals display */
                $('.totals-value').fadeOut(fadeTime, function() {
                    $('#cart-subtotal').html(subtotal.toFixed(2));
                    $('#cart-tax').html(tax.toFixed(2));
                    $('#cart-shipping').html(shipping.toFixed(2));
                    $('#cart-total').html(total.toFixed(2));
                    if (total == 0) {
                        $('.checkout').fadeOut(fadeTime);
                    } else {
                        $('.checkout').fadeIn(fadeTime);
                    }
                    $('.totals-value').fadeIn(fadeTime);
                });
            }


            /* Update quantity */
            function updateQuantity(quantityInput) {
                /* Calculate line price */
                var productRow = $(quantityInput).parent().parent();
                var price = parseFloat(productRow.children('.product-price').text());
                var quantity = $(quantityInput).val();
                var linePrice = price * quantity;

                /* Update line price display and recalc cart totals */
                productRow.children('.product-line-price').each(function() {
                    $(this).fadeOut(fadeTime, function() {
                        $(this).text(linePrice.toFixed(2));
                        recalculateCart();
                        $(this).fadeIn(fadeTime);
                    });
                });
            }


            /* Remove item from cart */
            function removeItem(removeButton) {
                /* Remove row from DOM and recalc cart total */
                var productRow = $(removeButton).parent().parent();
                productRow.slideUp(fadeTime, function() {
                    productRow.remove();
                    recalculateCart();
                });
            }

        });
    </script>

@endpush