<header id="page-header" class="js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown" data-timeout="600">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <a class="link-fx font-size-lg font-w700 text-dark" href="{{ route('landing') }}">
                {{ config('app.name') }}<span class="text-primary">App</span> <small class="font-w600 text-black">{{ config('app.version') }}</small>
            </a>
        </div>
        <div class="d-none d-lg-flex align-items-center">
            <ul class="nav-main nav-main-horizontal nav-main-hover">
                @guest
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{ route('login') }}">
                            <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                            <span class="nav-main-link-name">{{ __('Login') }}</span>
                        </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{ route('register') }}">
                            <i class="nav-main-link-icon fa fa-fire"></i>
                            <span class="nav-main-link-name">{{ __('Register') }}</span>
                        </a>
                    </li>
                    @endif
                @else
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.dashboard') }}">
                            <i class="nav-main-link-icon fa fa-compass"></i>
                            <span class="nav-main-link-name">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.dashboard') }}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <x-forms.formLink :action="route('logout')" class="nav-main-link" :id="'logout-form'">
                            <i class="nav-main-link-icon fa fa-arrow-alt-circle-left"></i> {{ __('Logout') }}
                        </x-forms.formLink>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <div id="page-header-search" class="overlay-header bg-primary">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
</header>

