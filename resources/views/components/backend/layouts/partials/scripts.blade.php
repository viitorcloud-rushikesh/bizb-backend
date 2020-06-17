<!-- Dashmix Core JS -->
<script src="{{ mix('/js/dashmix.app.js') }}"></script>

<!-- Laravel Original JS -->
<!-- <script src="{{ mix('/js/laravel.app.js') }}"></script>  -->

<script src="{{ asset('js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>jQuery(function(){ Dashmix.helpers('highlightjs'); });</script>

@yield('js_after')

<livewire:scripts />
<script src="{{ asset('/js/common/script.js') }}"></script>
<script src="{{ asset('/js/common/confirmBox.js') }}"></script>
