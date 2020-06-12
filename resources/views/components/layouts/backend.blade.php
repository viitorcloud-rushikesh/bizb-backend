<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <x-layouts.partials.meta />
        <x-layouts.partials.styles />
    </head>
    <body>
        <!-- Page Container -->
        <x-layouts.partials.commented />
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            <x-layouts.partials.backend.sideoverlay />
            <x-layouts.partials.backend.sidebar />
            <x-layouts.partials.backend.header />

            <!-- Main Container -->
            <main id="main-container">
                {{ $slot }}
            </main>
            <!-- END Main Container -->

            <x-layouts.partials.backend.footer />
        </div>
        <!-- END Page Container -->

        <x-layouts.partials.scripts />
    </body>
</html>
