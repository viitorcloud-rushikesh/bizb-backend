<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <x-backend.layouts.partials.meta />
        <x-backend.layouts.partials.styles />
    </head>
    <body>
        <!-- Page Container -->
        <x-backend.layouts.partials.commented />
        <div id="page-container">
            @istrue($nav)
                <x-backend.layouts.partials.frontend.nav />
            @endistrue
            <!-- Main Container -->
            <main id="main-container">
                {{ $slot }}
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <x-backend.layouts.partials.scripts />
    </body>
</html>
