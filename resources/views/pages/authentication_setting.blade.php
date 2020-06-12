<x-layouts.backend>
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
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Scan this barcode with your app</h3>
            </div>
            <div class="block-header block-header-default">
                <p>Scan the image above with the two-factor authentication app on your phone. If you can’t use a barcode, use text <br><br> <b>{{$as_string ?? ''}}</b></p>
            </div>

            <div>
                {!! $as_qr_code !!}
            </div>

            <div>
                <h4>Enter the six-digit code from the application</h4>
                <h6>After scanning the barcode image, the app will display a six-digit code that you can enter below</h6>

                <form action="{{route('admin.pages.save-two-way-authentication-details')}}" method="post" id="two-way-authentication">
                    @csrf
                    <input type="hidden" value="2" name="authentication_status">
                    <input type="text" name="authentication_code" required="required" placeholder="123456">
                    <button type="submit">Enable</button>

                </form>
            </div>

        </div>
        <!-- END Your Block -->
    </div>

{{--{{$as_string}}--}}
{{--{!! $as_qr_code !!}--}}
    <!-- END Page Content -->
</x-layouts.backend>
