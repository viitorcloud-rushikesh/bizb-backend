<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <x-backend.layouts.partials.meta />
        <x-backend.layouts.partials.styles />
    </head>
    <body>
        <!-- Page Container -->
        <x-backend.layouts.partials.commented />
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            <x-backend.layouts.partials.sideoverlay />
            <x-backend.layouts.partials.sidebar />
            <x-backend.layouts.partials.header />

            <!-- Main Container -->
            <main id="main-container">
                {{ $slot }}
            </main>
            <!-- END Main Container -->

            <x-backend.layouts.partials.footer />
        </div>
        <!-- END Page Container -->

        <x-backend.layouts.partials.scripts />
    </body>
</html>
