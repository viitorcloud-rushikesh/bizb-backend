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
    <x-elements.page-header title="My Profile" breadcrumbs="App" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>
            <x-elements.form class="mb-5" action="{{route('admin.users.update', ['user' => $user->id])}}" method="PUT" id="frmUserUpdate">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <img class="img-avatar img-avatar-thumb" src="https://via.placeholder.com/300/09f/fff.png" alt="">
                    </div>
                    <div class="col-lg-9">
                        <div class="form-row">
                            <x-elements.textbox class="form-group col-md-6" id="username" name="username" type="text" placeholder="Username" value="{{ $user->username }}">
                                Username
                            </x-elements.textbox>
                            <x-elements.textbox class="form-group col-md-6" id="name" name="name" type="text" placeholder="Name" value="{{ $user->name }}">
                                Name
                            </x-elements.textbox>
                        </div>
                        <div class="form-row">
                            <x-elements.textbox class="form-group col-md-6" id="email" name="email" type="email" placeholder="Email Address" value="{{ $user->email }}">
                                Email Address
                            </x-elements.textbox>
                            <x-elements.textbox class="form-group col-md-6" id="mobile" name="mobile" type="text" placeholder="Phone Number" value="{{ $user->mobile }}">
                                Phone Number
                            </x-elements.textbox>
                        </div>
                        <div class="form-row">
                            <x-elements.textbox class="form-group col-md-12" id="current_password" name="current_password" type="password" placeholder="Password">
                                Password
                            </x-elements.textbox>
                        </div>
                        <h2 class="content-heading">Change Password</h2>
                        <div class="form-row">
                            <x-elements.textbox class="form-group col-md-6" id="password" name="password" type="password" placeholder="New Password">
                                New Password
                            </x-elements.textbox>
                            <x-elements.textbox class="form-group col-md-6" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password">
                                Confirm Password
                            </x-elements.textbox>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <x-elements.button type="submit" class="btn-primary px-5">Save</x-elements.button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-elements.form>
        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
