<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <x-layouts.partials.meta />
        <x-layouts.partials.styles />
    </head>
    <body>
        <!-- Page Container -->
        <x-layouts.partials.commented />
        <div id="page-container">
            @istrue($nav)
                <x-layouts.partials.frontend.nav />
            @endistrue
            <!-- Main Container -->
            <main id="main-container">
                {{ $slot }}
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <x-layouts.partials.scripts />
    </body>
</html>
