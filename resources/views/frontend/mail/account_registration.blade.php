<x-layouts.simple>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address through OTP') }}</div>

                    <div class="card-body">

                        {{ __('Below mentioned OTP is for email verification.') }}
                        {{ __('OTP : ').$otp }}

{{--                        <a class="btn btn-sm" href="{{route('email-verification',[$user['email'], $user['confirmation_code']])}}">{{__('Verify Email')}}</a>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.simple>
