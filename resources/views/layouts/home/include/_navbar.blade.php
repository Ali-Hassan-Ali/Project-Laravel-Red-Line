    <section id="banner">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 fixed-top" id="custom-nav">

            <div class="container">
                <a class="navbar-brand p-0 hvr-grow" href="/">
                    <img src="{{ asset('home_files/images/logo.png') }}" alt="" width="200px">
                    <span class="text-danger fs-300 font-weight-bold" href="/"></span>
                </a>

                <div class="dropdown mr-md-0 ml-0 ml-md-5">
                    <div id="cart-content">
                        
                        <span class="fa-stack fa-2x has-badge" id="data-count" data-count="{{ Cart::count() }}" style="font-size: 22px;">
                            <i class="fa fa-circle fa-stack-2x d-flex justify-content-center"></i>
                            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse d-flex justify-content-center"></i>
                        </span>
                        <div class="dropdown-content mr-sm-2">
                            <div id="carted"> 
                                @foreach (Cart::content() as $product)
                                    
                                    <div class="item-cart row mt-2">
                                        <img src="{{ $product->model->image_path }}" class="px-3 border-image" alt="" width="100">
                                        <small class="text-flix">{{ $product->model->name }}
                                            <br>@lang('home.quantity') - {{ $product->qty }}
                                            <br>@lang('home.price') - {{ app()->getLocale() == 'ar' ? 'ج س' :  'SDG' }} : {{ number_format($product->model->exchange_rate * $product->qty,2) }}
                                        </small>
                                    </div>

                                @endforeach
                            </div>
                            <div class="btn btn-dark d-block my-2 border-10">
                                 <small>@lang('home.totle_price') - </small> <small id="totle-price">
                                    @if (session()->has('coupon'))

                                         {{ number_format(Cart::subtotal() - session()->get('coupon'),2) }}
                                        
                                    @else

                                         {{ Cart::subtotal() }}

                                    @endif
                                </small>
                            </div>
                            @if (Cart::count() == 0)
                                
                                <div class="btn btn-danger d-block my-2 border-10 bg-danger">
                                    
                                    <h6>@lang('dashboard.no_data_found')</h6>                                

                                </div>

                            @else

                                <a href="{{ route('wallet.index') }}" class="btn btn-danger btn-sm borderi col-12 mt-3 px-1 py-1 mr-0">@lang('home.go_card')</a>
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-light btn-sm col-12 borderi mt-3 px-2 py-1">@lang('home.buy_now')</a>

                            @endif
                        </div>

                    </div>
                </div>

                <div id="myOverlay" class="overlay">
                  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                  <div class="overlay-content container justify-content-center mt-2">
                    <form action="{{ route('autocomplete') }}" method="get">
                          <input id="searching" class="typeahead form-control col-12 justify-content-center" type="search">
                    </form>
                  </div>
                </div>

                <div class="btn btn-danger" onclick="openSearch()" style="cursor: pointer;">
                    <i class="fa fa-search"></i>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse col-md-8" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">@lang('home.home') <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.show') }}">@lang('home.shop')</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#service">Our Services</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home.category')
                            </a>
                            <div class="dropdown-menu border-none" aria-labelledby="navbarDropdown">
                                
                                @foreach (App\Models\Categorey::all() as $category)
                                    
                                    <a class="dropdown-item" href="{{ route('category.show',$category->id ) }}">{{ $category->name }}</a>

                                @endforeach

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home.language')
                            </a>
                            <div class="dropdown-menu border-none" aria-labelledby="navbarDropdown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>

                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">@lang('home.contact_us')</a>
                        </li>
                    </ul>
                    @auth

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ auth()->user()->image_path }}" alt="" class="rounded-circle" width="30px">
                            </a>
                            <div class="dropdown-menu border-none" aria-labelledby="navbarDropdown">
                                @if (auth()->user()->hasPermission('dashboard_read'))
                                    <a class="dropdown-item" href="{{ route('dashboard.welcome') }}">
                                        @lang('home.dashboard')
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('profile',auth()->user()->id) }}">
                                    @lang('home.profile')
                                </a>

                                <a class="dropdown-item" href="{{ route('purchase.index') }}">
                                    @lang('home.purchase')
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">@lang('home.logout')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                            
                    @else

                        <ul class="navbar-nav mr-auto">
                            <a href="{{ route('login') }}" class="btn btn-danger m-1 hvr-pop"><i class="fa fa-user"></i> @lang('home.login') </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-danger m-1 hvr-pop"><i class="fa fa-user-plus"></i> @lang('home.register') </a>
                        </ul>

                    @endauth
                </div>
            </div>

        </nav>
        <!--end of nav-->

    </section>
