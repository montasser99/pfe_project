@extends('layouts.layout')
@section('content')


            <div class="page-header">
                <h1>Dashboard <small>Welcome back <span class="text-primary">Maria Fällström</span></small></h1>


                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>



            <div class="content-wrap">  <!--START: Content Wrap-->

                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fs-bars"></i> Live Feeds</h3>
                                <div class="tools">
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="col-md-8">
                                    <div class="chartDashboard" id="chartLive"></div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">

                                        <div class="col-sm-6 col-md-12 pt-md">
                                            My Tasks <strong class="pull-right">12/20</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" style="width: 60%;"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-12 pt-md">
                                            Storage <strong class="pull-right">8/20 GB</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-success" style="width: 40%;"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-12 pt-md">
                                            Bugs  <strong class="pull-right">90/100</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-danger" style="width: 90%;"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-12 pt-md">
                                            User Testing <strong class="pull-right">7 Days</strong>
                                            <div class="progress progress-sm progress-striped active">
                                                <div class="progress-bar progress-bar-warning" style="width: 80%;"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3 col-sm-6 col-xs-6 col-mob">
                        <div class="panel">
                            <div class="panel-body text-center">

                                <h4>Visitors</h4>

                                <input class="chart-knob"
                                       data-angleArc=360
                                       data-bgColor="rgba(255,72,89,0.1)"
                                       data-fgColor="#FF4859"
                                       data-thickness=".2"
                                       value="90"
                                       data-end="90"
                                       data-width="100"
                                       data-height="100"
                                       data-readonly="true">

                                <div class="db-details pt-md">
                                    <ul class="list-unstyled text-left">
                                        <li class="text-danger">
                                            <i class="fa fa-square"></i> &nbsp;Today
                                            <span class="pull-right">20%</span>
                                        </li>
                                        <li class="text-success">
                                            <i class="fa fa-square"></i> &nbsp;Yesterday
                                            <span class="pull-right">40%</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 col-mob">
                        <div class="panel">
                            <div class="panel-body text-center">

                                <h4>Bar Chart</h4>

                                <span class="sparkline-bar"
                                      data-height="100"
                                      data-barColor="#00C9E6"
                                      data-lineColor="#32c8de"
                                      data-barWidth="10">15,20,34,56,78,23,90,13,50,20,45</span>

                                <div class="pt-md mb-sm text-lg">
                                    <span> 140 <i class="fa fa-angle-double-up text-success"></i></span> &nbsp;
                                    <span> 250 <i class="fa fa-angle-double-down text-danger"></i></span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 col-mob">
                        <div class="panel">
                            <div class="panel-body text-center">
                                <h4>Settings</h4>
                                <ul class="text-left list-unstyled list-quick-setting-1">
                                    <li><i class="fa fa-wifi"></i> &nbsp; Wifi <a href="#" class="btn btn-danger btn-xs">Off</a></li>
                                    <li><i class="fa fa-envelope"></i> &nbsp; Email <a href="#" class="btn btn-success btn-xs">On</a></li>
                                    <li><i class="fa fa-linux"></i> &nbsp; Linux <a href="#" class="btn btn-success btn-xs">On</a></li>
                                    <li><i class="fa fa-book"></i> &nbsp; Book <a href="#" class="btn btn-danger btn-xs">Off</a></li>
                                    <li><i class="fa fa-dropbox"></i> &nbsp; Dropbox <a href="#" class="btn btn-success btn-xs">On</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 col-mob">
                        <div class="panel">
                            <div class="panel-body text-center">

                                <h4>Pie Chart</h4>

                                <span class="sparkline-pie"
                                      data-height="100"
                                      data-width="120"
                                      data-sliceColors="['#ed5441','#609cec', '#51d466', '#fcd419']">13,28,35,16</span>

                                <div class="pt-md mb-sm text-lg">
                                    <span> 140 <i class="fa fa-angle-double-up text-success"></i></span> &nbsp;
                                    <span> 250 <i class="fa fa-angle-double-down text-danger"></i></span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="monthly" id="mycalendar"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div id="browser-chart" style="height:370px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 socialAnalytics">

                        <div class="col-md-6 col-sm-6 col-xs-6 ui-padd">
                            <!-- UI social -->
                            <div class="ui-social facebook">
                                <!-- facebook -->
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2345</a></h5>
                                        <h6><a href="#">Likes</a></h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2224</a></h5>
                                        <h6><a href="#">Shares</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ui-padd">
                            <div class="ui-social google-plus ">
                                <!-- Google plus -->
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2345</a></h5>
                                        <h6><a href="#">Photos</a></h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">1111</a></h5>
                                        <h6><a href="#">Share</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ui-padd">
                            <!-- Twitter -->
                            <div class="ui-social twitter">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">1144</a></h5>
                                        <h6><a href="#">Tweets</a></h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2211</a></h5>
                                        <h6><a href="#">Followers</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ui-padd">
                            <!-- Youtube -->
                            <div class="ui-social youtube">
                                <a href="#"><i class="fa fa-youtube"></i></a>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2312</a></h5>
                                        <h6><a href="#">Videos</a></h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5><a href="#">2478</a></h5>
                                        <h6><a href="#">Likes</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                
            </div>  <!--END: Content Wrap-->


     @endsection
