<section id="footer" class="text-white">
        <h2 class="text-center wow flash" data-wow-duration="4s" data-wow-offset="0">@lang('home.contct') <span class="text-danger">@lang('home.cus')</span></h2>
        <div class="container">
            <div class="row pt-5 mt-md-0">
                <div class="col-md-4 wow bounceInLeft" data-wow-duration="2s" data-wow-offset="0">
                    <div class="log-soci">
                        <div class="logo-ft col-0">
                            <div class="row">
                                <i class="fa fa-map-marker text-danger"></i><h2>@lang('home.our_locations')</h2>
                            </div>
                            <p class="map">
                                @if (app()->getLocale() == 'ar')

                                    <h4>{{ setting('our_locations_ar') }}</h4>
                                    
                                @else

                                    <h4>{{ setting('our_locations_en') }}</h4>

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="social-flix col-md-4 px-0 ml-3 ml-md-0 mx-md-auto wow zoomOut" data-wow-duration="2s" data-wow-offset="0">
                    <ul class="list-contact mt-5 pb-5 px-3 mr-sm-5" style="list-style: none">
                        <li>
                            <a href="tel:{{ setting('phone') }}" class="text-light">
                                <p class="row">
                                    <i class="fa fa-phone fa-1x text-danger d-flex align-items-center justify-content-center mr-2" style="border-radius: 100px; width: 30px; height: 30px; background-color: #fff;">
                                </i> - {{ setting('phone') }}
                                </p>
                            </a>
                        </li>
                            <li>
                                <a href="tel:{{ setting('phone_one') }}" class="text-light">
                                    
                                <p class="row">
                                    <i class="fa fa-phone fa-1x text-danger d-flex align-items-center justify-content-center mr-2" style="border-radius: 100px; width: 30px; height: 30px; background-color: #fff;">
                                    </i> - {{ setting('phone_one') }}
                                </p>

                                </a>
                            </li>
                        <li>
                            <a href="mailto:{{ setting('email') }}" class="text-light">
                                <p class="row">
                                    <i class="fa fa-envelope text-danger fa-1x d-flex align-items-center justify-content-center mr-2" style="border-radius: 100px; width: 30px; height: 30px; background-color: #fff;">
                                    </i> - {{ setting('email') }}
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{ setting('whatsapp') }}" class="text-light">
                            
                            <p class="row">
                                <i class="fa fa-whatsapp text-danger fa-1x d-flex align-items-center justify-content-center mr-2" style="border-radius: 50px; width: 30px; height: 30px; background-color: #fff;">
                                </i> - {{ setting('whatsapp') }}
                            </p>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 wow bounceInRight" data-wow-duration="2s" data-wow-offset="0">
                    <div class="payment">
                        <p>@lang('home.payments')</p>
                        <ul style="list-style: none" class="pl-0 pb-4">
                            
                            @foreach (App\Models\Payment::all() as $payment)
                            
                            <li class="img mr-5 mt-3"><img src="{{ $payment->payment_path }}" width="70" height="70"></li>
                                
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>