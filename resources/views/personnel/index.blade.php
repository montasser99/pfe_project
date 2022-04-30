@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Personnel Table</h3>
                                 <div class="tools">
                        <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                        <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                    </div>
                </div>

                <div class="float-center">
                    <a href="{{ route('personnels.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="right">
                        créer un nouveau
                    </a>
                  </div>

                  <div class="panel-body">
                    <table class="table table-striped table-dataTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th> Matricule </th>
                                <th> Nom </th>
                                <th> Prenom </th>
                                <th> Email </th>
                                <th> Sexe </th>
                                <th> Date de naissance </th>
                                <th> Nature agent </th>
                                <th>Type fonction</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach ($personnels as  $personnel )
                        <tr>
                            <td>
                                <img class='image rounded-circle' src="{{ url('public/Image/'.$personnel->image) }}"  height="50" class="hidden-sm" style=" margin-left: 10px;
                                    border-top-left-radius: 100% 100%;
                                    border-top-right-radius: 100% 100%;
                                    border-bottom-right-radius: 100% 100%;
                                    border-bottom-left-radius: 100% 100%;" width="40px">
                            </td>
                            <td style="padding: 34px;">{{  $personnel->PERS_MAT_95          }}</td>
                            <td>{{  $personnel->PERS_NOM             }}</td>
                            <td>{{  $personnel->PERS_PRENOM          }}</td>
                            <td>{{  $personnel->EMAIL                }}</td>

                            @if($personnel->PERS_SEXE_X == 'F')
                            <td>Femme</td>
                            @else
                            <td>Homme</td>
                            @endif
                            <td>{{  $personnel->PERS_DATE_NAIS       }}</td>
                            <td>{{  $personnel->NATAG_LIB_X50        }}</td>
                            <td>{{  $personnel->LIB_TYPE             }}</td>

                        <td>
                            <a class="btn btn-sm btn-primary " href="{{ route('personnels.show',$personnel->PERS_MAT_95 ) }}"><i class="fa fa-fw fa-eye"></i> Afficher</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('personnels.edit',$personnel->PERS_MAT_95 ) }}"><i class="fa fa-fw fa-edit"></i> Editer</a>
                        </td>
                        <td>
                            <form action="{{ route('personnels.destroy',$personnel->PERS_MAT_95) }}" method="POST">
                                @csrf
                                @method('DELETE')




                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>supprimer</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
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
