@extends('layouts.layout')

@section('content')

    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Table absence de <strong style="color: blue">{{Auth::user()->name ?? null}}</strong> </h3>                       
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-dataTable">
                            <thead>
                                <tr>
                                    <th>Nature d'absence </th>
                                    <th>Date Debut </th>
                                    <th>période début </th>
                                    <th>Date Fin </th>
                                    <th>période fin </th>
                                    <th>Nombre de jour</th>
                                    <th>absence cumulé</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if (Auth::user()->role == 'admin')
                            @foreach ($AdminABS as $absence)
                                <tr>
                                    </td>
                                    <td>{{ $absence->natAbs->LIBELLE_ABS ?? 'None' }}</td>
                                    <td>{{ $absence->ABS_DATE_DEB }}</td>

                                    @if ($absence->ABS_PERDEB_X == 'A')
                                        <td>AM</td>
                                    @else
                                        <td>PM</td>
                                    @endif

                                    <td>{{ $absence->ABS_DATE_FIN }}</td>
                                    @if ($absence->ABS_PERFIN_X == 'A')
                                        <td>AM</td>
                                    @else
                                        <td>PM</td>
                                    @endif
                                    <td>{{ $absence->ABS_NBRJOUR_93 }}</td>
                                    <td>{{ $absence->ABS_CUMULE_9 }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary "
                                            href="{{ route('absenceAdmin.show', $absence->ABS_MAT_95) }}"><i
                                                class="fa fa-fw fa-eye"></i> Afficher</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .float-center {
        height: 60px;
        margin-left: 16px;

    }

</style>
</div>
<!--END: Content Wrap-->
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
<script type="text/javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-ui.min.js"></script>


<script>
jQuery(document).ready(function() {
    DataTableBasic.init();
});

</script>

@endsection
