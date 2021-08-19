<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.dashboard')</span></a></li>

            @if (auth()->user()->hasPermission('users_read'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fas fa-users-cog"></i><span> @lang('dashboard.users') </span></a></li>
            @endif

            @if (auth()->user()->hasPermission('clients_read'))
                <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-users"></i><span>@lang('dashboard.clients')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('categoreys_read'))
                <li><a href="{{ route('dashboard.categoreys.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.categorey')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fab fa-product-hunt"></i><span> @lang('dashboard.products') </span></a></li>
            @endif

            @if (auth()->user()->hasPermission('cupons_read'))
                <li><a href="{{ route('dashboard.cupons.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.cupons')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('orders_read'))
                <li><a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-shopping-cart"></i><span>@lang('dashboard.orders')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('gallerys_read'))
                <li><a href="{{ route('dashboard.gallerys.index') }}"><i class="fa fa-picture-o"></i><span>@lang('dashboard.gallerys')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('supports_read'))
                <li><a href="{{ route('dashboard.supports.index') }}"><i class="fa fa-comment-alt"></i><span>@lang('dashboard.supports')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('payments_read'))
                <li><a href="{{ route('dashboard.payments.index') }}"><i class="fa fa-credit-card"></i><span>@lang('dashboard.payments')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('settings_read'))
                <li class="{{  request()->routeIs(['dashboard.service.index','dashboard.contact_us.index','dashboard.social_links.index']) ? 'treeview menu-open' : 'treeview' }}" style="height: auto;">
                  
                  <a href="#">
                    <i class="fa fa-gear"></i> <span>@lang('dashboard.settings')</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                      
                  <ul class="treeview-menu {{  request()->routeIs(['dashboard.service.index','dashboard.contact_us.index','dashboard.social_links.index']) ? 'treeview menu-open' : 'treeview' }}" style="display: {{  request()->routeIs(['dashboard.service.index','dashboard.contact_us.index','dashboard.social_links.index']) ? 'block' : 'none' }};">
                    <li><a href="{{ route('dashboard.service.index') }}"><i class="fa fa-concierge-bell"></i> @lang('dashboard.services')</a></li>
                    <li><a href="{{ route('dashboard.contact_us.index') }}"><i class="fa fa-address-book"></i> @lang('dashboard.contact_us')</a></li>
                    <li><a href="{{ route('dashboard.social_links.index') }}"><i class="fa fa-link"></i> @lang('dashboard.social_links')</a></li>
                  </ul>

                </li>
            @endif

        </ul>

    </section>

</aside>

