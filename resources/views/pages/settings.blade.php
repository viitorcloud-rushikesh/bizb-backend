<x-backend.layouts.backend>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Settings</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        @if($two_way_authentication_setting)
            <!-- Your Block -->
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Two-factor authentication</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('backend.pages.authentication-enable')}}" method="get" id="two-way-authentication">
                        <input type="hidden" value="{{$current_authentication_setting}}" name="authentication_status">
                        <input type="hidden" value="{{time()}}" name="current_timestamp">
                        <button type="submit" >@if($current_authentication_setting == 1) Disabled @else Enable @endif</button>
                    </form>
                </div>
            </div>
            <!-- END Your Block -->
        @endif
    </div>

{{--{{$as_string}}--}}
{{--{!! $as_qr_code !!}--}}
    <!-- END Page Content -->
</x-backend.layouts.backend>
