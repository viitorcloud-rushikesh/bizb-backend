<x-layouts.simple>
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('assets/media/photos/photo19@2x.jpg');">
        <div class="row no-gutters bg-gd-sun-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="text-center">
                        <a class="link-fx text-warning font-w700 font-size-h1" href="{{ route('landing') }}">
                            <span class="text-dark">{{ config('app.name') }}</span>
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Password Reminder</p>
                    </div>
                    <!-- END Header -->

                    <!-- Reminder Form -->
                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="js-validation-reminder" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group py-3">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-block btn-hero-lg btn-hero-warning">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                    <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                        <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in-alt text-muted mr-1"></i> Sign In
                                        </a>
                                        <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                                            <i class="fa fa-plus text-muted mr-1"></i> New Account
                                        </a>
                                    </p>
                                </div>
                                @if(env('SOCIAL_MEDIA_AUTH'))
                                    <div class="mb-3 text-center">
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">OR</p>
                                    </div>
                                    <div class="form-group">
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('social-media.login','facebook') }}">
                                                <i class="fab fa-facebook-square text-muted mr-1"></i>
                                            </a>
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('social-media.login','twitter') }}">
                                                <i class="fab fa-twitter text-muted mr-1"></i>
                                            </a>
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('social-media.login','linkedin') }}">
                                                <i class="fab fa-linkedin text-muted mr-1"></i>
                                            </a>
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('social-media.login','google') }}">
                                                <i class="fab fa-google text-muted mr-1"></i>
                                            </a>
                                        </p>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <!-- END Reminder Form -->
                </div>
            </div>
            <!-- END Main Section -->

            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                <div class="p-3">
                    <p class="display-4 font-w700 text-white mb-0">
                        Don’t worry of failure..
                    </p>
                    <p class="font-size-h1 font-w600 text-white-75 mb-0">
                        ..but learn from it!
                    </p>
                </div>
            </div>
            <!-- END Meta Info Section -->
        </div>
    </div>
    <!-- END Page Content -->
</x-layouts.simple>
