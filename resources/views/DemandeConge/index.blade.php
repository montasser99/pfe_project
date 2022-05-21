@extends('layouts.layout')
@section('content')

    <div class="content-wrap">
        <!--START: Content Wrap-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des demandes</h3>
                        <div class="tools">
                            <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                            <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'user')
                        <div class="float-center" style="margin-top: 16px;">
                            <a href="{{ route('Demandeconges.create')}}" class="btn btn-primary btn-sm" style="        border-radius: -9px;
                            margin-top: -41px;
                            margin-left: 13px;
                          " data-placement="right">
                                <i class=" fs-plus-circle"> </i> ajouter une demande
                            </a>
                        </div>
                    @endif
                    <div class="panel-body">
                        <table class="table table-striped table-dataTable">
                            <thead>
                                <tr>
                                    <th> Nom </th>
                                    <th> Date debut </th>
                                    <th> Date fin </th>
                                    <th> Nature De Conge</th>
                                    <th> Adresse </th>
                                    <th> solde </th>
                                    <th> statu </th>

                                    @if (Auth::user()->role == 'admin')
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    @else
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    @endif


                                </tr>
                            </thead>

                            <tbody>
                                @if (Auth::user()->role == 'admin')
                                    @foreach ($DemandeConge as $Demande)
                                        <tr>
                                            <td>{{ $Demande->name }}</td>
                                            <td>{{ $Demande->date_deb }}</td>
                                            <td>{{ $Demande->date_fin }}</td>
                                            <td>{{ $Demande->NatureDeConge }}</td>
                                            <td>{{ $Demande->adresse_conge }}</td>
                                            <td>{{$Demande->users->solde}}</td>

                                            @if ($Demande->statu == 'en cours..')
                                                <td style="color: blue ;  ">{{ $Demande->statu }}</td>
                                            @else
                                                <td style="color: red ;  ">{{ $Demande->statu }}</td>
                                            @endif

                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ asset('storage/demandes/' . $Demande->file) }}"
                                                    target="_blank"><i class="fa fa-fw fa-eye"></i> Ouvrir PDF</a>
                                            </td>
                                            <td><a class="btn btn-sm btn-danger " href="{!! route('annulerDemande', ['annule' => $Demande->id]) !!}"><i
                                                        class="fa fa-fw fa-eye"></i> Annuler</a>
                                            </td>

                                            <td><a class="btn btn-sm btn-info " href="{{  route('ajouterSignataire', ['id' => $Demande->id])  }}"><i
                                                        class="fa fa-fw fa-eye"></i> Ajouter signataires</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    <!-- partie pour test de user -->
                                @else
                                    @foreach ($userDemande as $Demande)
                                        <tr>
                                            <td>{{ $Demande->name }}</td>
                                            <td>{{ $Demande->date_deb }}</td>
                                            <td>{{ $Demande->date_fin }}</td>
                                            <td>{{ $Demande->NatureDeConge }}</td>
                                            <td>{{ $Demande->adresse_conge }}</td>
                                            <td>{{ Auth::user()->solde }}</td>
                                            @if ($Demande->statu == 'en cours..')
                                                <td style="color: blue ;  ">{{ $Demande->statu }}</td>
                                            @else
                                                <td style="color: red ;  ">{{ $Demande->statu }}</td>
                                            @endif
                                            <td><a class="btn btn-sm btn-info"
                                                    href="{{ asset('storage/demandes/' . $Demande->file) }}"
                                                    target="_blank"><i class="fa fa-fw fa-eye"></i> Ouvrir PDF</a>
                                            </td>
                                            <td><a class="btn btn-sm btn-primary "
                                                    href="{{ route('Demandeconges.show', $Demande->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Afficher</a>
                                            </td>
                                            <td>

                                                @if ($Demande->statu == 'en cours..')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('Demandeconges.edit', $Demande->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editer</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('Demandeconges.destroy', $Demande->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i>
                                                        supprimer</button>
                                                </form>
                                            </td>
                                    @endif
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
