@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Modifier table demande conge</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('Demandeconges.update', $DemandeConge->id) }}" role="form"  method="post" >
                           @csrf
                            @method('PUT')
                            <div class="form-body">

                                <div class="form-group ">
                                    <label>Date debut</label>
                                    <input type="date" class="form-control"  name="date_deb" value="{{ $DemandeConge->date_deb}}"   data-prompt-position="topLeft">
                                </div>

                                <div class="form-group ">
                                    <label>Date fin</label>
                                    <input type="date" class="form-control"  name="date_fin" value="{{ $DemandeConge->date_fin}}"   data-prompt-position="topLeft">
                                </div>

                                <div class="form-group ">
                                    <label>nature de conge</label>
                                    <select  class="form-control" name = "NatureDeConge" value="{{ $DemandeConge->NatureDeConge}}"      data-prompt-position="topLeft">
                                        @foreach ( $natureCongee as $nature )
                                        <option>{{ $nature->NOM }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="form-group ">
                                    <label>Intérim durant le congé</label>
                                    <input type="string" class="form-control"  name="interim" value="{{ $DemandeConge->interim}}"  data-prompt-position="topLeft">
                                </div>

                                <div class="form-group ">
                                    <label>fonction</label>
                                    <input type="string" class="form-control"  name="fonction" value="{{ $DemandeConge->fonction}}"   data-prompt-position="topLeft">
                                </div>

                                <div class="form-group ">
                                    <label>direction</label>
                                    <input type="string" class="form-control"  name="direction" value="{{ $DemandeConge->direction}}"  data-prompt-position="topLeft">
                                </div>
                                <div class="form-group ">
                                    <label>Adresse durant le congé</label>
                                    <input type="string" class="form-control"  name="adresse_conge"  value="{{ $DemandeConge->adresse_conge}}"  data-prompt-position="topLeft">
                                </div>

                                <div class="form-actions fluid" style="">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">update </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div> <!-- END: Panel Body -->
                </div>
            </div>
        </div>
    </div> <!--END: Content Wrap-->
@endsection
