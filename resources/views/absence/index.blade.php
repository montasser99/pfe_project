@extends('layouts.layout')

@section('content')

    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Absence Table</h3>
                        <div class="tools">
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                    </div>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                    @if (Auth::user()->role == 'admin')
                        <div class="float-center">
                            <a href="{{ route('absences.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="right">
                                créer un nouveau absence
                            </a>
                        </div>
                    @endif

                    <div class="panel-body">
                        <table class="table table-striped table-dataTable">
                            <thead>
                                <tr>
                                    <th>Nom et prenom</th>
                                    <th>Nature d'absence </th>
                                    <th>Date Debut </th>
                                    <th>période début </th>
                                    <th>Date Fin </th>
                                    <th>période fin </th>
                                    <th>Nombre de jour</th>
                                    <th>absence cumulé</th>

                                    @if (Auth::user()->role == 'admin')
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    @else
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>

                                @if (Auth::user()->role == 'admin')
                                    @foreach ($absences as $absence)
                                        <tr>
                                            <td>{{ $absence->personnels->PERS_NOM . ' ' . $absence->personnels->PERS_PRENOM ?? 'None' }}
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
                                                    href="{{ route('absences.show', $absence->ABS_MAT_95) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Afficher</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('absences.edit', $absence->ABS_MAT_95) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Editer</a>

                                            </td>
                                            <td>
                                                <form action="{{ route('absences.destroy', $absence->ABS_MAT_95) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <Button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>supprimer</Button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                <!-- pour afficher les tables de user de la session !-->
                                @if (Auth::user()->role == 'user')
                                    @foreach ($userABS as $absence)
                                        <tr>
                                            <td>{{ $absence->personnels->PERS_NOM . ' ' . $absence->personnels->PERS_PRENOM ?? 'None' }}
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
                                                    href="{{ route('absences.show', $absence->ABS_MAT_95) }}"><i
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
