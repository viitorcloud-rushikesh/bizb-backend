<x-layouts.simple>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">

                        {{ __('Please verify your email. Press below button') }}

                        <a class="btn btn-sm" href="{{route('email-verification',[$user['email'], $user['confirmation_code']])}}">{{__('Verify Email')}}</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.simple>
