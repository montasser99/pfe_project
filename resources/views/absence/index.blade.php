@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

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

            @if (Auth::user()->role == 'admin')

             <div class="float-center">
                <a href="{{ route('absences.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="right">
                  Create new
                </a>
              </div>

            @endif

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
              @endif

                <div class="panel-body">
                    <table class="table table-striped table-dataTable">
                        <thead>
                            <tr>
                                <th>Abs Mat 95   </th>
                                <th>Abs Numord 93</th>
                                <th>Abs Nat 9    </th>
                                <th>Abs Cet 9    </th>
                                <th>Abs Date Deb </th>
                                <th>Abs Perdeb X </th>
                                <th>Abs Date Fin </th>
                                <th>Abs Perfin X </th>
                                <th>Abs Nbrjour 93</th>
                                <th>Abs Cumule 9 </th>

                                @if (Auth::user()->role == 'admin')
                                <th></th>
                                <th></th>
                                <th></th>

                                @endif
                            </tr>
                        </thead>

                        @if (Auth::user()->role == 'admin')

                            @foreach ($absences as $absence )
                            <tr>
                                <td>{{ $absence->ABS_MAT_95    }}</td>
                                <td>{{ $absence->ABS_NUMORD_93 }}</td>
                                <td>{{ $absence->ABS_NAT_9     }}</td>
                                <td>{{ $absence->ABS_CET_9     }}</td>
                                <td>{{ $absence->ABS_DATE_DEB  }}</td>
                                <td>{{ $absence->ABS_PERDEB_X  }}</td>
                                <td>{{ $absence->ABS_DATE_FIN  }}</td>
                                <td>{{ $absence->ABS_PERFIN_X  }}</td>
                                <td>{{ $absence->ABS_NBRJOUR_93}}</td>
                                <td>{{ $absence->ABS_CUMULE_9  }}</td>
                                <td>
                                <a class="btn btn-sm btn-primary " href="{{ route('absences.show',$absence->ABS_MAT_95 ) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                </td>
                                <td>
                                <a class="btn btn-sm btn-success" href="{{ route('absences.edit',$absence->ABS_MAT_95 ) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>

                                </td>
                                <td>
                                <form action="{{ route('absences.destroy',$absence->ABS_MAT_95) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif

                        <!-- pour afficher les tables de user de la session !-->
                        @if(Auth::user()->role == 'user')
                        @foreach ($userABS as $absence )
                        <tr>
                            <td>{{ $absence->ABS_MAT_95    }}</td>
                            <td>{{ $absence->ABS_NUMORD_93 }}</td>
                            <td>{{ $absence->ABS_NAT_9     }}</td>
                            <td>{{ $absence->ABS_CET_9     }}</td>
                            <td>{{ $absence->ABS_DATE_DEB  }}</td>
                            <td>{{ $absence->ABS_PERDEB_X  }}</td>
                            <td>{{ $absence->ABS_DATE_FIN  }}</td>
                            <td>{{ $absence->ABS_PERFIN_X  }}</td>
                            <td>{{ $absence->ABS_NBRJOUR_93}}</td>
                            <td>{{ $absence->ABS_CUMULE_9  }}</td>
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
     .float-center
     {
        height: 60px;
        margin-left: 16px;

     }
    </style>
</div>  <!--END: Content Wrap-->
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
<script type="text/javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="assets/plugins/lib/jquery-ui.min.js"></script>



<script>
    jQuery(document).ready(function () {
        DataTableBasic.init();
    });
</script>


@endsection
