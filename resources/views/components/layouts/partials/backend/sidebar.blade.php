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
            <x-navigations.navigationItem :href="route('admin.dashboard')" name="admin.dashboard">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Dashboard</span>
                <span class="nav-main-link-badge badge badge-pill badge-success">5</span>
            </x-navigations.navigationItem>
            <li class="nav-main-item {{ active('admin.users.*', 'open') }} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">Users</span>
                </a>
                <ul class="nav-main-submenu">
                    <x-navigations.navigationItem :href="route('admin.users.show', ['user' => auth()->user()->id])" name="admin.users.show">
                            <span class="nav-main-link-name">My profile</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.users.create')" name="admin.users.create">
                            <span class="nav-main-link-name">Add user</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.users.index')" name="admin.users.index">
                            <span class="nav-main-link-name">View users</span>
                    </x-navigations.navigationItem>
                </ul>
            </li>

            <li class="nav-main-heading">Various</li>
            <li class="nav-main-item
                                   {{--  @routeis('admin.pages.*')
                                        open
                                    @endrouteis --}}
                        ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-bulb"></i>
                    <span class="nav-main-link-name">Examples</span>
                </a>
                <ul class="nav-main-submenu">
                    <x-navigations.navigationItem :href="route('admin.pages.datatables')" name="admin.pages.datatables">
                            <span class="nav-main-link-name">DataTables</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.pages.slick')" name="admin.pages.slick">
                        <span class="nav-main-link-name">Slick Slider</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.pages.blank')" name="admin.pages.blank">
                        <span class="nav-main-link-name">Blank</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.pages.settings')" name="admin.pages.settings">
                        <span class="nav-main-link-name">Settings</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.test')" name="admin.test">
                        <span class="nav-main-link-name">Test</span>
                    </x-navigations.navigationItem>
                    <x-navigations.navigationItem :href="route('admin.pages.elements')" name="admin.pages.elements">
                        <span class="nav-main-link-name">Elements</span>
                    </x-navigations.navigationItem>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
