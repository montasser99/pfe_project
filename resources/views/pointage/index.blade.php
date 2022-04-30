@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">pointage Table</h3>
                                 <div class="tools">
                        <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                        <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                    </div>
                </div>

                <div class="table-responsive">
                        <table class="table table-striped table-dataTable ">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Jourcptpnt</th>
                                <th>Datetimepnt</th>
                                <th>Originepnt</th>
                                <th>Pntsourceid</th>
                                <th>Validerpar</th>
                                <th>Typejour</th>
                                <th>Typeoperation</th>
                                <th>Onpntannule</th>
                                <th>Annulepar</th>
                                <th>Pntcreerpar</th>
                                <th>Datecreation</th>
                                <th>Motifpntmanuelh511</th>
                                <th>Etat</th>
                                <th>Oncloture</th>
                                <th>Datecloture</th>
                                <th>Cloturepar</th>
                            </tr>
                        </thead>
                <tbody>
                     @if (Auth::user()->role == 'admin')

                    @foreach ($pointages as $pointage)
                    <tr>
                        <td>{{ $pointage->Matricule         }}</td>
                        <td>{{ $pointage->JourCptPnt        }}</td>
                        <td>{{ $pointage->DateTimePnt       }}</td>
                        <td>{{ $pointage->OriginePnt        }}</td>
                        <td>{{ $pointage->PntSourceID       }}</td>
                        <td>{{ $pointage->ValiderPar        }}</td>
                        <td>{{ $pointage->TypeJour          }}</td>
                        <td>{{ $pointage->TypeOperation     }}</td>
                        <td>{{ $pointage->OnPntAnnule       }}</td>
                        <td>{{ $pointage->AnnulePar         }}</td>
                        <td>{{ $pointage->PntCreerPar       }}</td>
                        <td>{{ $pointage->DateCreation      }}</td>
                        <td>{{ $pointage->MotifPntManuelH511 }}</td>
                        <td>{{ $pointage->Etat              }}</td>
                        <td>{{ $pointage->OnCloture         }}</td>
                        <td>{{ $pointage->DateCloture       }}</td>
                        <td>{{ $pointage->CloturePar        }}</td>
                    </tr>
                    @endforeach
                    @endif

                    @if(Auth::user()->role == 'user')

                    @foreach ($userPOINT as $pointage)
                    <tr>

                    <td>{{ $pointage->MvtPointageID     }}</td>
                    <td>{{ $pointage->Matricule         }}</td>
                    <td>{{ $pointage->JourCptPnt        }}</td>
                    <td>{{ $pointage->DateTimePnt       }}</td>
                    <td>{{ $pointage->OriginePnt        }}</td>
                    <td>{{ $pointage->PntSourceID       }}</td>
                    <td>{{ $pointage->ValiderPar        }}</td>
                    <td>{{ $pointage->TypeJour          }}</td>
                    <td>{{ $pointage->TypeOperation     }}</td>
                    <td>{{ $pointage->OnPntAnnule       }}</td>
                    <td>{{ $pointage->AnnulePar         }}</td>
                    <td>{{ $pointage->PntCreerPar       }}</td>
                    <td>{{ $pointage->DateCreation      }}</td>
                    <td>{{ $pointage->MotifPntManuelH511 }}</td>
                    <td>{{ $pointage->Etat              }}</td>
                    <td>{{ $pointage->OnCloture         }}</td>
                    <td>{{ $pointage->DateCloture       }}</td>
                    <td>{{ $pointage->CloturePar        }}</td>

                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                  </table>
                 </div>

            </div>
        </div>
    </div>


</div>  <!--END: Content Wrap-->
<style>
    /*
 table.dataTable th:nth-child(1),
    table.dataTable th:nth-child(2),
    table.dataTable th:nth-child(3),
    table.dataTable th:nth-child(4),

    table.dataTable th:nth-child(5) {
      width: 10px;
      max-width: 10px;
      word-break: break-all;
      white-space: pre-line;
    }

    table.dataTable td:nth-child() {
      width: 10px;
      max-width: 70px;
      word-break: break-all;
      white-space: pre-line;
    }
    */
   /*
    div.dataTables_wrapper {
        width: 3000px;
        margin: 0 auto;
    }
    */
    /*
    table.dataTable th {
    font-size: 0.55em;
    }*/
        </style>

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
    jQuery(document).ready(function () {
        DataTableBasic.init();
    });



</script>


@endsection

