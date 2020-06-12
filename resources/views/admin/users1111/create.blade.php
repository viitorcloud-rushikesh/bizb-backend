<x-layouts.backend>
    @section('css_before')
        <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    @endsection
    @section('js_after')
        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- Page JS Helpers -->
        <script>jQuery(function(){ Dashmix.helpers(['select2']); });</script>
    @endsection
    <!-- Hero -->
    <x-elements.page-header title="Create user" breadcrumbs="App" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>

            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-md-12 error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <livewire:user-form action="{{route('admin.users.store')}}" method="POST" id="frmCreateUser" submit-event="submit" submit-text="Save"/>

        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
