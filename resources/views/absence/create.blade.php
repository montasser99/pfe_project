@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update table absence</h3>
                </div>
                <div class="panel-body ">

                    <form action="{{ route('absences.store') }}" role="form"  method="post">
                        <div class="form-body">
                            @csrf

                            <div class="form-group ">
                                <label>ABS_MAT_95</label>
                                <input type="number" class="form-control"  name="ABS_MAT_95"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_NUMORD_93</label>
                                <input type="number" class="form-control " name="ABS_NUMORD_93"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_NAT_9</label>
                                <input type="number" class="form-control " name="ABS_NAT_9"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_CET_9</label>
                                <input type="number" class="form-control " name="ABS_CET_9"  data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_DATE_DEB</label>
                                <input type = "date" class="form-control" name = "ABS_DATE_DEB"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_PERDEB_X</label>
                                <input type = "text" class="form-control" name = "ABS_PERDEB_X"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_DATE_FIN</label>
                                <input type = "date" class="form-control" name = "ABS_DATE_FIN"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_PERFIN_X</label>
                                <input type = "text" class="form-control" name = "ABS_PERFIN_X"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>ABS_NBRJOUR_93</label>
                                <input type = "number" class="form-control" name = "ABS_NBRJOUR_93"    data-prompt-position="topLeft">
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">create </button>
                            </div>
                        </div>
                    </form>

                </div>  <!-- END: Panel Body -->

                <style>
                    .footer

                    {
                    background-color: #fff;
                    height: 50px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    left: 0px;
                    padding: 15px;
                    border-top: 1px solid #f0f3f5;
                    }

                    </style>

                @endsection


