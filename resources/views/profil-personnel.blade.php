@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="assets/css/lib/page-login.css">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="col container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">

                    <form action="{{ route('imageModifier', Auth::user()->id) }}" role="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card user-card-full " style="margin-bottom: 10px">


                            <div class="row m-l-0 m-r-0">


                                <div class="form-group col-sm-4" style="height: 429px;position: relative;
                                    left: -14px;">
                                    <input style="display: none" type="file" class="form-control" name="image" id="image"
                                        data-prompt-position="topLeft">
                                    <label for="image">

                                        <img src="{{ url('public/Image/' . Auth::user()->image) }}" style="width: 100%"
                                            alt="">
                                    </label>

                                </div>

                                <div class="col-md-6">
                                    <div class="card-block" style="    width: 874px;
                                        position: relative;
                                        top: 54px;">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informations personnelles</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Role</p>
                                                @if (Auth::user()->role == 'admin')
                                                    <h6 class="text-muted f-w-400">Admin</h6>
                                                @else
                                                    <h6 class="text-muted f-w-400">Employer</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Nom Prenom</p>
                                                <h6 class="text-muted f-w-400">{{ Auth::user()->name }}</h6>
                                            </div>


                                            <button style="position: relative;
                                                bottom: -80px;
                                                left: -176px;
                                                width: 149px;
                                                height: 47px;
                                                border-radius: 14px;
                                                font-size: 16px;
                                                letter-spacing: 3px;
                                                font-weight: 600;" class="btn btn-primary" type="submit">MODIFIER</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="padding">
            <div class="col container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full " style="padding: -10px">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4  user-profile " style="padding: 10px">
                                <div class="card-block text-center text-white">
                                    <div class="animatedParent">
                                        <div class='slider' style="padding:-30px ; margin-top:-5px ;">
                                            <div class='slide1'></div>
                                            <div class='slide2'></div>
                                            <div class='slide3'></div>
                                            <div class='slide4'></div>
                                            <div class='slide5'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information sur l'entreprise</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Nom</p>
                                            <h6 class="text-muted f-w-400">ETAP Entreprise Tunisienne d’Activités
                                                Pétrolières </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">adresse</p>
                                            <h6 class="text-muted f-w-400">Ave Mohamed V, Tunis</h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">lien vers notre site</p>
                                            <h6 class="text-muted f-w-400">http://www.etap.com.tn/</h6>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(0, 0, 0, 0.164);
            box-shadow: 0 1px 20px 0 rgba(0, 0, 0, 0.355);
            border: none;
            margin-bottom: 80px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 15px 0 0 15px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#fff2f4));
            background: linear-gradient(to right, #3e3d70, #ebcbb8)
        }





        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 10px
        }

        h6 {
            font-size: 14px
        }


        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 4rem
        }



        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 10px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #505555 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 900
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

    </style>

    <script>
        function refreshPage() {
            window.location.reload() * 2;
        }
    </script>
@endsection()
