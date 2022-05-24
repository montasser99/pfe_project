<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Workflow Demande Conge Etap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Prakasam Mathaiyan">
    <meta name="description" content="">

    <!--[if IE]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('assets/plugins/lib/modernizr.js') }}"></script>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/chosen/ImageSelect/ImageSelect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib/page_messages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/monthly/css/monthly.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/emojionearea/emojionearea.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-default.css') }}">
</head>

<body>



    <div class="wrapper has-footer">

        <header class="header-top navbar fixed-top">

            <div class="top-bar">
                <!-- START: Responsive Search -->
                <div class="container">
                    <div class="main-search">
                        <div class="input-wrap">
                            <input class="form-control" type="text" placeholder="Search Here...">
                            <a href="page-search.html"><i class="sli-magnifier"></i></a>
                        </div>
                        <span class="close-search search-toggle"><i class="ti-close"></i></span>
                    </div>
                </div>
            </div> <!-- END: Responsive Search -->

            <div class="navbar-header">
                <button type="button" class="navbar-toggle side-nav-toggle">
                    <i class="ti-align-left"></i>
                </button>

                <a class="navbar-brand" href="/">

                    <!-- <span class="navbar-toggler-icon">ETAP</span> -->
                </a>
                <ul class="nav navbar-nav-xs">
                    <!-- START: Responsive Top Right tool bar -->
                    <li>
                        <a href="javascript:;" class="collapse" data-toggle="collapse"
                            data-target="#headerNavbarCollapse">
                            <i class="sli-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="search-toggle">
                            <i class="sli-magnifier"></i>
                        </a>
                    </li>

                </ul> <!-- END: Responsive Top Right tool bar -->

            </div>

            <div class="collapse navbar-collapse" id="headerNavbarCollapse">

                <ul class="nav navbar-nav">

                    <li class="hidden-xs">
                        <a href="javascript:;" class="sidenav-size-toggle">
                            <i class="ti-align-left"></i>
                        </a>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- code ajouter -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <!-- -->


                        <li class="user-profile dropdown " >
                            <a href="" class="clearfix dropdown-toggle " data-toggle="dropdown">
                                <img src="{{ url('public/Image/' . Auth::user()->image) }}" alt="" class="hidden-sm">
                                <div class="user-name">{{ Auth::user()->name }} <small
                                        class="fa fa-angle-down"></small></div>
                            </a>
                            <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                                <li><a href="{{ url('/profil') }}"><i class="sli-user"></i> mon profil</a></li>

                                <li><a href="{{ route('logout') }}
                                " onclick="event.preventDefault();
                                 document.getElementById('sli-logout').submit();"><i class="sli-logout"></i> déconnexion</a>
                                </li>

                                <form id="sli-logout" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>

            </div><!-- END: Navbar-collapse -->

        </header> <!-- END: Header -->


        <aside class="side-navigation-wrap sidebar-fixed">
            <!-- START: Side Navigation -->
            <div class="sidenav-inner">

                <ul class="side-nav magic-nav">
                    @if (Auth::user()->role == 'admin')
                        <li class="side-nav-header" style="margin-top: 20px;">tous les utilisateurs</li>
                    @else
                        <li class="side-nav-header" style="margin-top: 20px;">Employer</li>
                    @endif
                    <li class="{{ Request::segment(1)==='/' }}">
                        <a href="{{ url('/') }}"><i class="sli-dashboard"></i> <span
                                class="nav-text">tableau de bord</span></a>
                    </li>
                    <li class="{{ Request::segment(1) === 'profil' ? 'active' : null }}">
                        <a href="{{ url('/profil') }}">
                            <i class="  fs-user-4"></i>
                            <span class="nav-text">profil</span>
                        </a>
                    </li>

                    @if (Auth::user()->role == 'admin')
                        <li class="{{ Request::segment(1) === 'personnels' ? 'active' : null }}">
                            <a href="{{ url('/personnels') }}">
                                <i class="fs-users"></i>
                                <span class="nav-text">Personnels</span>
                            </a>
                        </li>
                    @endif

                    <li class="has-submenu">
                        <a href="#submenuOne" data-toggle="collapse" aria-expanded="false">
                            <i class="fs-calendar"></i>
                            <span class="nav-text">Conge</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuOne">
                            <ul>
                                <li><a href="{{ url('/conges') }}"><i class="fs-list"></i> Liste de conges</a>
                                </li>
                                <li><a href="{{ url('/Demandeconges') }}"><i class="   fs-paperplane"></i> liste des
                                        demandes</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::segment(1) === 'absences' ? 'active' : null }}">
                        <a href="{{ url('/absences') }}">
                            <i class="fs-user-block"></i>
                            <span class="nav-text">Absences</span>
                        </a>
                    </li>

                    <li class="{{ Request::segment(1) === 'pointages' ? 'active' : null }}">
                        <a href="{{ url('/pointages') }}">
                            <i class="fs-clock"></i>
                            <span class="nav-text">Pointages</span>
                        </a>
                    </li>

                    @if (Auth::user()->role == 'admin')
                    <li class="side-nav-header" style="margin-top: 0%;">administrateur</li>

                    <li class="{{ Request::segment(1) === 'absenceAdmin' ? 'active' : null }}">
                        <a href="{{ url('absenceAdmin') }}">
                            <i class="fs-user-block"></i>
                            <span class="nav-text">Mes absences</span>
                        </a>
                    </li>

                    <li class="{{ Request::segment(1) === 'pointageAdmin' ? 'active' : null }}">
                        <a href="{{ url('pointageAdmin') }}">
                            <i class="fs-clock"></i>
                            <span class="nav-text">Mes pointages</span>
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuTwo" data-toggle="collapse" aria-expanded="false">
                            <i class="fs-calendar"></i>
                            <span class="nav-text">Conge admin</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuTwo">
                            <ul>
                                <li><a href="{{ url('/congeAdmin') }}"><i class="fs-list"></i> Liste de conges</a>
                                </li>
                                <li><a href="{{ url('/DemandeAdmin') }}"><i class="   fs-paperplane"></i> liste des  demandes</a></li>
                            </ul>
                        </div>
                    </li>

                    @endif

            </div><!-- END: sidebar-inner -->

        </aside> <!-- END: Side Navigation -->

        <div class="main-container">
            <!-- START: Main Container -->
            @yield('content')
        </div>
        <footer class="footer">
            <!-- START: Footer -->
            &copy; Copyright 2022
        </footer> <!-- END: Footer -->



    </div> <!-- END: wrapper -->


    <script type="text/javascript" src="{{ asset('assets/plugins/lib/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/lib/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/lib/plugins.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/flot/excanvas.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flot/jquery.flot.crosshair.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/lib/sparklines.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/lib/jquery.knob.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/monthly/js/monthly.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/emojionearea/emojionearea.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatable/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/app.base.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/page-table.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.base.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/cmp-todo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/page-dashboard.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            DataTableBasic.init();
        });
    </script>
</body>
<style>
    .navbar-brand {
        position: relative;
        background: url({{ asset('assets/images/ETAP.png') }});
        width: 220px;
        height: 60px;
        background-size: 50%;
        background-repeat: no-repeat;
        background-position: center;
        top: 5%
    }

</style>


</html>
