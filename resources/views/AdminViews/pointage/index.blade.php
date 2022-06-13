@extends('layouts.layout')

@section('content')

    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Table pointage de <strong style="color: blue">{{Auth::user()->name ?? null}}</strong> </h3>
                        <br>
                        <h3 class="panel-title"> Matricule : <strong style="color: blue">{{Auth::user()->personnel_id ?? null}}</strong> </h3>
                        <div class="tools">
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-dataTable ">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>date entre matin</th>
                                    <th>date sortie matin</th>
                                    <th>date entrer midi</th>
                                    <th>date sortie midi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->role == 'admin')
                                    @foreach ($AdminPOINT as $pointage)
                                        <tr>
                                            <td>{{ $pointage->personnels->EMAIL }}</td>
                                            <td>{{ $pointage->pointageEntMatin }}</td>
                                            <td>{{ $pointage->pointageSorMatin }}</td>
                                            <td>{{ $pointage->pointageEntMidi }}</td>
                                            <td>{{ $pointage->pointageSorMidi }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END: Content Wrap-->


    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/plugins/lib/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="assets/plugins/lib/jquery-ui.min.js"></script>
    <!--
    <script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    -->
    <script>
        jQuery(document).ready(function() {
            DataTableBasic.init();
        });
    </script>










@endsection
