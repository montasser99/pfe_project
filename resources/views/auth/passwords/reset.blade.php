<head>
    <script type="text/javascript" src="{{asset('assets/plugins/lib/modernizr.js')}}"></script>

    <link rel="icon" href="{{asset('assets/images/favicon.png" type="image/gif')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/animate-it/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-default.css')}}">
</head>
<style>
    .login2 {
        background: url({{ asset('assets/images/loginPage.jpg') }});
    }

</style>

<body class="login2" style="margin-top: 75px;">

    <div class="container">
        <div class="login flipInY" id="logindiv">

            <div class="text-center logo">
                <img src="{{asset('assets/images/success.png')}}"  alt="logo" style="height: 70px;">
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <!--    <div class="input-icon">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        -->
                    <div class="form-group">
                        <div class="input-icon">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <!-- <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        -->
                    <div class="form-group">
                        <div class="input-icon">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="nouveau mot de passe                                ">

                            @error('password')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--    <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    -->
                    <div class="form-group">
                        <div class="input-icon">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required placeholder="Confirmer mot de passe">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                réinitialiser mot de passe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
