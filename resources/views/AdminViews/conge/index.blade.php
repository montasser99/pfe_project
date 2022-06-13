@extends('layouts.layout')
@section('content')
    <div class="content-wrap">
        <!--START: Content Wrap-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des conges de <strong style="color: blue">{{Auth::user()->name ?? null}}</strong> </h3>
                        <div class="tools">
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                        @if (Auth::user()->role == 'admin')
                        <div class="float-center" style="margin-top: 16px;">
                            <a href="{{ route('Demandeconges.create') }}" class="btn btn-primary btn-sm" style="       border-radius: 2px;
                            margin-top: -6px;
                            margin-left: 0px;
                          " data-placement="right">
                                <i class=" fs-plus-circle"> </i> ajouter une demande
                            </a>
                        </div>
                    @endif
                    </div>
                    @if(Auth::user()->role=="admin")

                    @if(!$Annuel->isEmpty())
                            <button class="button" style="position: absolute;
                            right: 340px;
                            top: 17px;  border: none;  background-color: #7a2048; box-shadow: 5px 2px 20px black;  color: white;">Annuel <br>
                            {{$Annuel[0]->CCONG_SOLDE_9}} jours</button>

                    @endif

                    @if(!$Exceptionnel->isEmpty())
                            <button class="button" style="position: absolute;
                            right:415px;
                            top: 17px;  border: none; box-shadow: 5px 2px 20px black; background-color: #408ec6;color: white; ">Exceptionnel<br>
                            10 jours</button>

                    @endif

                    @if(!$Recuperation->isEmpty())
                            <button class="button" style="position: absolute;
                              right: 520px;
                              top: 17px;   border: none; box-shadow: 5px 2px 20px black; background-color: #1e2761;color: white;">Recupiration <br>
                               {{$Recuperation[0]->CCONG_SOLDE_9}} jours</button>

                    @endif
                    @endif

                    <div class="panel-body">
                        <table class="table table-striped table-dataTable">
                            <thead>
                                <tr>
                                    <th> Nature De Conge</th>
                                    <th> Date debut </th>
                                    <th> Date fin </th>
                                    <th> Adresse </th>
                                    <th> phone </th>
                                    <th>       </th>
                                    <th>       </th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($AdminConge as $AdminC)
                                <tr>
                                    <td>{{ $AdminC->nature_conges->NOM ?? 'None' }} </td>
                                    <td>{{ $AdminC->CONG_DATE_DEB }}  </td>
                                    <td>{{ $AdminC->CONG_DATE_FIN }}  </td>
                                    <td>{{ $AdminC->CONG_ADRES_X30 }} </td>
                                    <td>{{ $AdminC->CONG_TEL_98 }} </td>
                                    <td><a class="btn btn-sm btn-primary "
                                        href="{{ route('congeAdmin.show', $AdminC->CONG_MAT_95) }}"><i
                                            class="fa fa-fw fa-eye"></i> Afficher</a></td>
                                    </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> <!--END: Content Wrap-->


<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
<script type="text/javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-ui.min.js"></script>



<script>
    jQuery(document).ready(function() {
        DataTableBasic.init();
    });
</script>
@if ($message = Session::get('success'))
<script>
Swal.fire({
position: 'center',
icon: 'success',
title: "{{ session()->get('success') }}",
showConfirmButton: false,
timer: 2500
})
</script>
@endif

@endsection

