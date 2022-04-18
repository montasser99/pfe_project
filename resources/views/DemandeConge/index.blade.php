@extends('layouts.layout')
@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->
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
                @if (Auth::user()->role=='user')
                <div class="float-center">
                    <a href="{{ route('Demandeconges.create') }}" class="btn btn-primary btn-sm float-right btn-round"  data-placement="right">
                        <i class=" fs-plus-circle">  </i>    ajouter une demande
                    </a>
                  </div>
                @endif
                  <div class="panel-body">
                    <table class="table table-striped table-dataTable">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> Nom </th>
                                <th> Date debut </th>
                                <th> Date fin </th>
                                <th> Nature De Conge</th>
                                <th> Adresse </th>
                                 <th> statu </th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($DemandeConge as $Demande )
                        <tr>
                            <td>{{  $Demande->id            }}</td>
                            <td>{{  $Demande->name          }}</td>
                            <td>{{  $Demande->date_deb      }}</td>
                            <td>{{  $Demande->date_fin      }}</td>
                            <td>{{  $Demande->NatureDeConge  }}</td>
                            <td>{{  $Demande->adresse_conge }}</td>
                            <td style="color: blue">{{  $Demande->statu         }}</td>
                            <td><a class="btn btn-sm btn-primary " href="{{ route('Demandeconges.show',$Demande->id ) }}"><i class="fa fa-fw fa-eye"></i> Show</a>

                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('Demandeconges.edit',$Demande->id ) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('Demandeconges.destroy',$Demande->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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









@endsection
