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

            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-th"></i><span>@lang('dashboard.dashboard')</span></a></li>

            @if (auth()->user()->hasPermission('users_read'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.users')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('categoreys_read'))
                <li><a href="{{ route('dashboard.categoreys.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.categorey')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.products')</span></a></li>
            @endif

            <li class="treeview" style="height: auto;">
              
              <a href="#">
                <i class="fa fa-gear"></i> <span>@lang('dashboard.settings')</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('dashboard.service.index') }}"><i class="fa fa-circle-o"></i> عن الاكادميه</a></li>
              </ul>

            </li>

        </ul>

    </section>

</aside>

