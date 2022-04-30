@extends('layouts.layout')
@section('content')

<div class="col-md-10"  style="padding-right: -83px;
    padding-left: 270px; margin-top: 36px;
    margin-bottom: 75px;">

        <div class="panel panel-default">

            <div class="panel-body" style=" box-shadow: 0 0 15px black; margin-bottom: 30px;">
                <div class="panel panel-primary" style="margin-left: -15px;
                margin-right: -15px;
                margin-bottom: 30px;  ">
                    <div class="panel-heading" style="background-color: #363b5b; padding: 13px 310px; margin-bottom: 23px; ">
                    Demande conge de {{ $DemandeConge->personnels->PERS_NOM . ' ' . $DemandeConge->personnels->PERS_PRENOM }}
                    </div>
                <fieldset disabled style="padding: 3px;
                margin: 10px;">
                    <div class="form-group">
                        <label for="disabledTextInput">Matricule</label>
                        <input type="text"  id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->personnel_id }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">nom</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->personnels->PERS_NOM }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">prenom</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->personnels->PERS_NOM }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">date debut</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{$DemandeConge->date_deb }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Date fin</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->date_fin }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">phone</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">nature de conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->NatureDeConge }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Intérim durant le congé</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->interim }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">fonction</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->fonction }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">adresse de conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $DemandeConge->adresse_conge }}">
                    </div>

                </div>
                <a  class="btn btn-sm btn-danger" style="    margin-top: -2%;
                margin-left: 663px;
                padding: 5.6px 30px;
                font-size: 14px; " href="{{ route('Demandeconges.index')}}">retour</a>
            </div>
        </div>
    </div>










@endsection
