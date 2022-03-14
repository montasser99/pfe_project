
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard | Big Ben Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Prakasam Mathaiyan">
    <meta name="description" content="">

    <!--[if IE]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="assets/plugins/lib/modernizr.js"></script>
    <link rel="icon" href="assets/images/favicon.png" type="image/gif">

    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/chosen.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/ImageSelect/ImageSelect.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/dropzone/dropzone.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/trumbowyg/ui/trumbowyg.css">
    <link rel="stylesheet" type="text/css" href="assets/css/lib/page_messages.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/monthly/css/monthly.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/emojionearea/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-default.css">
</head>

<body>

    <div class="wrapper has-footer">

        <header class="header-top navbar fixed-top">

            <div class="top-bar">   <!-- START: Responsive Search -->
                <div class="container">
                    <div class="main-search">
                        <div class="input-wrap">
                            <input class="form-control" type="text" placeholder="Search Here...">
                            <a href="page-search.html"><i class="sli-magnifier"></i></a>
                        </div>
                        <span class="close-search search-toggle"><i class="ti-close" ></i></span>
                    </div>
                </div>
            </div>  <!-- END: Responsive Search -->

            <div class="navbar-header">
                <button type="button" class="navbar-toggle side-nav-toggle">
                    <i class="ti-align-left"></i>
                </button>

                <a class="navbar-brand" href="/">
                    <img src="assets/images/logo-w.svg">
                    <span>Big Ben</span>
                </a>

                <ul class="nav navbar-nav-xs">  <!-- START: Responsive Top Right tool bar -->
                    <li>
                        <a href="javascript:;" class="collapse" data-toggle="collapse" data-target="#headerNavbarCollapse">
                            <i class="sli-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="search-toggle">
                            <i class="sli-magnifier"></i>
                        </a>
                    </li>

                </ul>   <!-- END: Responsive Top Right tool bar -->

            </div>

            <div class="collapse navbar-collapse" id="headerNavbarCollapse">

                <ul class="nav navbar-nav">

                    <li class="hidden-xs">
                        <a href="javascript:;" class="sidenav-size-toggle">
                            <i class="ti-align-left"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="sli-bell"></i>
                            <div class="new-alert active"></div>
                        </a>
                        <ul class="dropdown-menu dropdown-lg list-group-dropdown">
                            <li class="no-link">4 New Notifications</li>
                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic profile-icon"><i class="ti-file"></i></div>
                                        <div class="detail">
                                            <span class="text-normal">Ricky Palmer</span>
                                            <span class="time">3 hrs ago</span>
                                            <p class="font-11 no-m-b text-overflow">Sent you a file</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic profile-icon"><i class="ti-email"></i></div>
                                        <div class="detail">
                                            <span class="text-normal">Charles Dockery</span>
                                            <span class="time">Jun 03, 2015</span>
                                            <p class="font-11 no-m-b text-overflow">Sent you a message</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic profile-icon"><i class="ti-shopping-cart-full"></i></div>
                                        <div class="detail">
                                            <span class="text-normal">Kimberly Crouch</span>
                                            <span class="time">May 17, 2015</span>
                                            <p class="font-11 no-m-b text-overflow">Purchased your item</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#" class="text-center">See all</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="sli-envelope"></i>
                            <span class="badge bg-danger">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-lg list-group-dropdown">

                            <li class="no-link font-12">You have 4 new notifications</li>

                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic"><img src="demo/users/img-user-02.jpg" alt=""></div>
                                        <div class="detail">
                                            <span class="text-normal">Cynthianawen</span>
                                            <span class="time">2 mins ago</span>
                                            <p class="font-11 no-m-b text-overflow">Start following you</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic"><img src="demo/users/img-user-03.jpg" alt=""></div>
                                        <div class="detail">
                                            <span class="text-normal">Megan Stamper</span>
                                            <span class="time">1 hr ago</span>
                                            <p class="font-11 no-m-b text-overflow">Accepted your friend request</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic"><img src="demo/users/img-user-04.jpg" alt=""></div>
                                        <div class="detail">
                                            <span class="text-normal">Alex Pushkin</span>
                                            <span class="time">yesterday</span>
                                            <p class="font-11 no-m-b text-overflow">Sent you a friend request</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="user-list-wrap">
                                        <div class="profile-pic"><img src="demo/users/img-user-05.jpg" alt=""></div>
                                        <div class="detail">
                                            <span class="text-normal">Bjarne Flur Kvistad</span>
                                            <span class="time">2 days ago</span>
                                            <p class="font-11 no-m-b text-overflow">Start following you</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li><a href="#" class="text-center">See all</a></li>
                        </ul>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="main-search hidden-xs">
                        <div class="input-wrap">
                            <input class="form-control" type="text" placeholder="Search Here...">
                            <a href="page-search.html"><i class="sli-magnifier"></i></a>
                        </div>
                    </li>

                    <li class="user-profile dropdown">
                        <a href="javascript:;" class="clearfix dropdown-toggle" data-toggle="dropdown">
                            <img src="demo/users/img-user-01.jpg" alt="" class="hidden-sm">
                            <div class="user-name">Maria Fällström <small class="fa fa-angle-down"></small></div>
                        </a>
                        <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                            <li><a href="user-profile.html"><i class="sli-user"></i> My Profile</a></li>
                            <li><a href="app-calendar.html"><i class="sli-calendar"></i> Calendar</a></li>
                            <li><a href="msg-inbox.html"><i class="fa fa-envelope-o"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="page-faq.html"><i class="sli-question"></i> FAQ's</a></li>
                            <li><a href="user-login.html"><i class="sli-logout"></i> Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </div><!-- END: Navbar-collapse -->

        </header>   <!-- END: Header -->


        <aside class="side-navigation-wrap sidebar-fixed">  <!-- START: Side Navigation -->
            <div class="sidenav-inner">

                <ul class="side-nav magic-nav">

                    <li class="side-nav-header">Navigation</li>

                    <li>
                        <a href="{{ url('/') }}"><i class="sli-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{url('/msg-inbox')}}">
                            <i class="sli-envelope"></i>
                            <span class="nav-text">Messages</span>
                            <span class="badge bg-danger">3</span>
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuOne" data-toggle="collapse" aria-expanded="false">
                            <i class="fs-grid-6"></i>
                            <span class="nav-text">Tables</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuOne">
                            <ul>
                                <li><a href="{{url('/table-basic')}}">Basic Tables</a></li>
                                <li><a href="{{url('/table-dataTable')}}">Data Table</a></li>
                                <li><a href="{{url('/table-editable')}}">Editable Table</a></li>
                            </ul>
                        </div>
                    </li>

                   

                    <li class="has-submenu">
                        <a href="#submenuThree" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-layers"></i>
                            <span class="nav-text">Forms</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuThree">
                            <ul>
                                <li><a href="form-basic.html">Basic</a></li>
                                <li><a href="form-advanced.html">Advanced Controls</a></li>
                                <li><a href="form-css-toggle.html">CSS Toggle</a></li>
                                <li><a href="form-validation.html">Validation</a></li>
                                <li><a href="form-wizard.html">Wizard</a></li>
                                <li><a href="form-upload.html">Upload</a></li>
                                <li><a href="form-editors.html">Editors</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuFive" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-map"></i>
                            <span class="nav-text">Maps</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuFive">
                            <ul>
                                <li><a href="map-google.html">Google</a></li>
                                <li><a href="map-vector.html">Vector</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuEleven" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-briefcase"></i>
                            <span class="nav-text">Components</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuEleven">
                            <ul>
                                <li><a href="cmp-nestable.html">Nestable List</a></li>
                                <li><a href="cmp-activity-list.html">Activity Timeline</a></li>
                                <li><a href="cmp-justgage.html">JustGage</a></li>
                                <li><a href="cmp-hr-timeline.html">Horizontal Timeline</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuSix" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-pie-chart"></i>
                            <span class="nav-text">Charts</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuSix">
                            <ul>
                                <li><a href="chart-flot.html">Flot Chart</a></li>
                                <li><a href="chart-morris.html">Morris</a></li>
                                <li><a href="chart-chart-js.html">Chart JS</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuSeven" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-user"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuSeven">
                            <ul>
                                <li><a href="user-profile.html">Profile</a></li>
                                <li><a href="user-contact-list.html">Contact List</a></li>
                                <li><a href="user-login.html">Login</a></li>
                                <li><a href="user-signup.html">Sign up</a></li>
                                <li><a href="user-forgotpassword.html">Forgot Password</a></li>
                                <li><a href="user-login-2.html">Login 2</a></li>
                                <li><a href="user-lock.html">Lock</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-header">More</li>

                    <li>
                        <a href="widgets.html">
                            <i class="sli-rocket"></i>
                            <span class="nav-text">Widgets</span>
                            <span class="badge bg-danger">10</span>
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuEight" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-compass"></i>
                            <span class="nav-text">Icons</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuEight">
                            <ul>
                                <li><a href="icons-dashicons.html">DashIcons</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                <li><a href="icons-fsicons.html">FS Icons</a></li>
                                <li><a href="icons-themify.html">Themify</a></li>
                                <li><a href="icons-lineicons.html">Line Icons</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuNine" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-trophy"></i>
                            <span class="nav-text">Applications</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuNine">
                            <ul>
                                <li><a href="app-log-view.html">Log View</a></li>
                                <li><a href="app-calendar.html">Calendar</a></li>
                                <li><a href="app-year-calendar.html">Year Calendar</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#submenuTen" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-sitemap"></i> <span class="nav-text">Menu Levels</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuTen">
                            <ul>
                                <li><a href="#" class="animsition-link">Menu 1.1</a></li>
                                <li><a href="#" class="animsition-link">Menu 1.2</a></li>
                                <li class="has-submenu">
                                    <a href="#submenuTenOne" data-toggle="collapse">Menu 1.3</a>
                                    <div class="sub-menu collapse" id="submenuTenOne">
                                        <ul>
                                            <li><a href="#">Menu 3.1</a></li>
                                            <li><a href="#">Menu 3.2</a></li>
                                            <li><a href="#">Menu 3.3</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-header">Progress</li>

                    <li>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-cog"></i></a>
                            <ul class="dropdown-menu dropdown-animated pop-effect pull-right">
                                <li><a href="#">Add new milestone</a></li>
                                <li><a href="#">Remove milestone</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="milestone">
                        <a href="#">
                            UX Design
                            <small class="pull-right">12/20</small>
                            <div class="progress progress-striped active">
                                <div class="progress-bar" style="width: 60%;"></div>
                            </div>
                        </a>
                    </li>

                    <li class="milestone">
                        <a href="#">
                            Frontend Development
                            <small class="pull-right">9/9</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: 100%;"></div>
                            </div>
                        </a>
                    </li>

                    <li class="milestone">
                        <a href="#">
                            Backend Development
                            <small class="pull-right">2/10</small>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" style="width: 20%;"></div>
                            </div>
                        </a>
                    </li>

                </ul>

            </div><!-- END: sidebar-inner -->

        </aside>    <!-- END: Side Navigation -->

        <div class="main-container">    <!-- START: Main Container -->
       @yield('content')
        </div>
       <footer class="footer"> <!-- START: Footer -->
        &copy; 2016 <b>Big Ben</b> Admin
        </footer>   <!-- END: Footer -->


    </div>  <!-- END: wrapper -->

    <script type="text/javascript" src="assets/plugins/lib/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="assets/plugins/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/lib/plugins.js"></script>

    <script type="text/javascript" src="assets/plugins/flot/excanvas.min.js"></script>
    <script type="text/javascript" src="assets/plugins/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="assets/plugins/flot/jquery.flot.tooltip.js"></script>
    <script type="text/javascript" src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="assets/plugins/flot/jquery.flot.crosshair.min.js"></script>
    <script type="text/javascript" src="assets/plugins/flot/jquery.flot.pie.min.js"></script>

    <script type="text/javascript" src="assets/plugins/lib/sparklines.js"></script>
    <script type="text/javascript" src="assets/plugins/lib/jquery.knob.min.js"></script>
    <script type="text/javascript" src="assets/plugins/monthly/js/monthly.js"></script>
    <script type="text/javascript" src="assets/plugins/emojionearea/emojionearea.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datatable/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/app.base.js"></script>
    <script type="text/javascript" src="assets/js/page-table.js"></script>
    <script type="text/javascript" src="assets/js/app.base.js"></script>
    <script type="text/javascript" src="assets/js/cmp-todo.js"></script>
    <script type="text/javascript" src="assets/js/page-dashboard.js"></script>
    <script>
        jQuery(document).ready(function () {
            DataTableBasic.init();
        });
    </script>
</body>
</html>
