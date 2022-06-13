@extends('layouts.layout')
@section('content')
    <div class="content-wrap">
        <!--START: Content Wrap-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Auth::user()->role=="user")
                        <h3 class="panel-title">Liste des conge de <strong style="color: blue">{{Auth::user()->name ?? null}}</strong> </h3>
                        @else
                        <h3 class="panel-title">Liste des conges</h3>
                        @endif
                        <div class="tools">
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                        @if (Auth::user()->role == 'user')
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

                        @if(Auth::user()->role=="user")

            @if(isset($Annuel))
                    <button class="button" style="position: absolute;
                    right: 340px;
                    top: 17px;  border: none;  background-color: #7a2048; box-shadow: 5px 2px 20px black;  color: white;">Annuel <br>
                    {{$Annuel[0]->CCONG_SOLDE_9}} jours</button>
            @endif

            @if(isset($Exceptionnel))
                    <button class="button" style="position: absolute;
                    right:415px;
                    top: 17px;  border: none; box-shadow: 5px 2px 20px black; background-color: #408ec6;color: white; ">Exceptionnel<br>
                    10 jours</button>
            @endif

            @if(isset($Recuperation))
                    <button class="button" style="position: absolute;
                      right: 520px;
                      top: 17px;   border: none; box-shadow: 5px 2px 20px black; background-color: #1e2761;color: white;">Recupiration <br>
                       {{$Recuperation[0]->CCONG_SOLDE_9}} jours</button>
            @endif
            @endif


                    @if(Auth::user()->role=='admin')


                    <div class="float-center">
                        <a href="{{ route('conges.create') }}" class="btn btn-primary btn-sm" data-placement="right" style="

                        margin-top: 5px;
                        margin-left: 13px;">
                            <i class=" fs-plus-circle"> </i> créer un nouveau congé
                        </a>
                    </div>
                    @endif

                    <div class="panel-body">
                        <table class="table table-striped table-dataTable">
                            <thead>
                                <tr>
                                    @if (Auth::user()->role == 'admin')
                                    <th> Nom </th>
                                    <th> Nature De Conge</th>
                                    <th> Date debut </th>
                                    <th> Date fin </th>
                                    <th> Adresse </th>
                                    <th> phone </th>
                                    <th>       </th>
                                    <th>       </th>

                                    @else

                                    <th> Nature De Conge</th>
                                    <th> Date debut </th>
                                    <th> Date fin </th>
                                    <th> Adresse </th>
                                    <th> phone </th>
                                    <th>       </th>
                                    <th>       </th>

                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->role == 'admin')
                                    @foreach ($Conge as $c)
                                        <tr>
                                            <td>{{ $c->personnels->PERS_NOM . ' ' . $c->personnels->PERS_PRENOM ?? 'None' }}</td>
                                            <td>{{ $c->nature_conges->NOM ?? 'None' }} </td>
                                            <td>{{ $c->CONG_DATE_DEB }} </td>
                                            <td>{{ $c->CONG_DATE_FIN }} </td>
                                            <td>{{ $c->CONG_ADRES_X30 }}</td>
                                            <td>{{ $c->CONG_TEL_98 }}</td>
                                            <td><a class="btn btn-sm btn-primary "
                                                href="{{ route('conges.show', $c->CONG_MAT_95) }}"><i
                                                    class="fa fa-fw fa-eye"></i>Afficher</a>
                                            </td>

                                            <!-- tester si l'employer est finit sont congé pour affiche edit -->
                                            @if($c->CONG_DATE_FIN > $date)
                                            <td>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('conges.edit', $c->CONG_MAT_95) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editer</a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($userConge as $userC)
                                        <tr>
                                            <td>{{ $userC->nature_conges->NOM ?? 'None' }} </td>
                                            <td>{{ $userC->CONG_DATE_DEB }}  </td>
                                            <td>{{ $userC->CONG_DATE_FIN }}  </td>
                                            <td>{{ $userC->CONG_ADRES_X30 }} </td>
                                            <td>{{ $userC->CONG_TEL_98 }} </td>
                                            <td><a class="btn btn-sm btn-primary "
                                                href="{{ route('conges.show', $userC->CONG_MAT_95) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Afficher</a></td>
                                            </tr>

                                    @endforeach
                                @endif
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
