@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | Big Ben Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Prakasam Mathaiyan">
    <meta name="description" content="">

    <!--[if IE]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('assets/plugins/lib/modernizr.js')}}"></script>
    <link rel="icon" href="{{asset('assets/images/favicon.png" type="image/gif')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/animate-it/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lib/cmp-bs-checkbox.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lib/page-login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-default.css')}}">
</head>
<style>
    .login2{
        background:url({{asset('assets/images/loginPage.jpg')}});
            }
</style>
<body class="login2">

    <div class="container">     <!-- Container Begin-->

        <div class="login animated flipInY" id="logindiv">

            <div class="row" style=" margin-top: 178px;
            margin-left: 100px;
            background-color: #FFFFFF;
            padding: 24px;
            margin-right: 97px;
        } ">   <!-- Row Begin-->

                <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3" style="    margin-top: 43px;">
                    <div class="content-lft">
                        <div class="text-center"><img src="{{asset('assets/images/etap.png')}}" alt="etap" style="height: 101px; margin-left: 42px;"></div>
                        <p class="small text-center  animated flipInX" style="margin-left: 65px;">entreprise tunisienne d'activités pétrolières</p>
                    </div>
                </div>


                <div class="col-xs-12 col-md-1 col-sm-1 col-lg-1">
                    <div class="v-line" id="v1"></div>
                    <div class="horizontal-divider hidden-xs"></div>
                    <div class="v-line" id="v2"></div>
                </div>

                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6" style="    margin-left: 43px;">

                    <h1 class="title animated flipInX">Mot de passe oublié ?</h1>
                    <p class="small-one animated flipInX">Ne vous inquiétez pas. Pour réinitialiser votre mot de passe, entrez l’adresse courriel que vous utilisez pour ouvrir une session. Il peut s’agir de votre adresse courriel ou d’une autre adresse courriel associée à votre compte.</p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">

                            @if(session('status'))
                            <div class="alert alert-success">
                                Nous avons envoyé votre lien de réinitialisation de mot de passe!
                            </div>
                            @endif
                            <input type="email" name="email" class="form-control"  placeholder="entrer votre email" value="{{old('email')}}">
                            <i class="fa fa-envelope" aria-hidden="true" ></i>
                            <span class="text-danger">@error('email'){{ $message }} </span>

                            @enderror
                        </div>

                        <div class="text-right mar-bot"><button href="#" type="submit" class="btn btn-secondary">réinitialiser mot de passe</button></div>

                    </form>

                </div>
            </div>

        </div>  <!-- Row End-->

    </div><!-- Container End -->


    <script type="text/javascript" src="{{asset('assets/plugins/lib/jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/lib/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/animate-it/animate-it.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/animate-it/arrow-line.js')}}"></script>
</body>
</html>
@endsection
