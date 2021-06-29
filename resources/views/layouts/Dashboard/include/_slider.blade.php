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

            @if (auth()->user()->hasPermission('categorey_read'))
                <li><a href="{{ route('dashboard.categorey.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.categorey')</span></a></li>
            @endif

        </ul>

    </section>

</aside>

