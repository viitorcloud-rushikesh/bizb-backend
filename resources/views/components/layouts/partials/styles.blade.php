<!-- Icons -->
<link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
<link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

<!-- Fonts and Styles -->
@yield('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/highlightjs/styles/atom-one-light.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
<link rel="stylesheet" id="css-main" href="{{ mix('/css/dashmix.css') }}">

<!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/xwork.css') }}"> -->
@yield('css_after')

<livewire:styles />
