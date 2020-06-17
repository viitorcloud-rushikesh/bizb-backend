<!-- Sidebar -->
<!--
    Sidebar Mini Mode - Display Helper classes

    Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

    Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
    Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
    Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w600 font-size-lg text-white" href="/">
                <span class="smini-visible">
                    <span class="text-white-75">D</span><span class="text-white">x</span>
                </span>
                <span class="smini-hidden">
                    <span class="text-white-75">Dash</span><span class="text-white">mix</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <x-backend.navigations.navigationItem :href="route('backend.dashboard')" name="backend.dashboard">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Dashboard</span>
                <span class="nav-main-link-badge badge badge-pill badge-success">5</span>
            </x-backend.navigations.navigationItem>
            <li class="nav-main-item {{ active('backend.users.*', 'open') }} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">Users</span>
                </a>
                <ul class="nav-main-submenu">
                    <x-backend.navigations.navigationItem :href="route('backend.users.show', ['user' => auth()->user()->id])" name="backend.users.show">
                            <span class="nav-main-link-name">My profile</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.users.create')" name="backend.users.create">
                            <span class="nav-main-link-name">Add user</span>
                    </x-backend.navigations.navigationItem>
                        <x-backend.navigations.navigationItem :href="route('backend.users.index')" name="backend.users.index">
                            <span class="nav-main-link-name">View users</span>
                    </x-backend.navigations.navigationItem>
                </ul>
            </li>

            <li class="nav-main-heading">Various</li>
            <li class="nav-main-item
                                   {{--  @routeis('backend.pages.*')
                                        open
                                    @endrouteis --}}
                        ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-bulb"></i>
                    <span class="nav-main-link-name">Examples</span>
                </a>
                <ul class="nav-main-submenu">
                    <x-backend.navigations.navigationItem :href="route('backend.pages.datatables')" name="backend.pages.datatables">
                            <span class="nav-main-link-name">DataTables</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.pages.slick')" name="backend.pages.slick">
                        <span class="nav-main-link-name">Slick Slider</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.pages.blank')" name="backend.pages.blank">
                        <span class="nav-main-link-name">Blank</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.pages.settings')" name="backend.pages.settings">
                        <span class="nav-main-link-name">Settings</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.test')" name="backend.test">
                        <span class="nav-main-link-name">Test</span>
                    </x-backend.navigations.navigationItem>
                    <x-backend.navigations.navigationItem :href="route('backend.pages.elements')" name="backend.pages.elements">
                        <span class="nav-main-link-name">Elements</span>
                    </x-backend.navigations.navigationItem>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
