<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title>{{ config('app.name', 'Laravel') }}</title>

<meta name="description" content="{{ config('app.description') }}">
<meta name="author" content="deltabits.io">
<meta name="robots" content="noindex, nofollow">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Icons -->
<link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
<link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

@if(!app()->environment('local'))
    <script src="https://browser.sentry-cdn.com/5.15.5/bundle.min.js" integrity="sha384-wF7Jc4ZlWVxe/L8Ji3hOIBeTgo/HwFuaeEfjGmS3EXAG7Y+7Kjjr91gJpJtr+PAT" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        Sentry.init({ dsn: '{{ env('SENTRY_JS_DSN') }}' });
        //myUndefinedFunction();
    </script>
@endif
<!-- Ziggy Routes -->
@routes
