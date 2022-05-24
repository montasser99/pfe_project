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
                    Absence de {{ $absence->personnels->PERS_NOM . ' ' . $absence->personnels->PERS_PRENOM }}

                      </div>
                      <fieldset disabled style="padding: 3px;
                      margin: 10px;">

                            <div class="form-row">

                       <div class="form-group col-md-12">
                        <label for="disabledTextInput">Matricule</label>
                        <input type="text"  id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->personnels->PERS_MAT_95 }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="disabledTextInput">Nom et prenom</label>
                        <input type="text"  id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->personnels->PERS_NOM . ' ' . $absence->personnels->PERS_PRENOM  }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="disabledTextInput">Email</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->personnels->EMAIL }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="disabledTextInput">Nature d'absence</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->natAbs->LIBELLE_ABS }}">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="disabledTextInput">Date Debut</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->ABS_DATE_DEB }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="disabledTextInput">periode debut</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                        @if($absence->ABS_PERDEB_X=='A')
                            placeholder="AM"
                            @else
                            placeholder="PM"
                            @endif>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="disabledTextInput">Date fin</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->ABS_DATE_FIN }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="disabledTextInput">periode fin</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                        @if($absence->ABS_PERFIN_X=='A')
                        placeholder="AM"
                        @else
                        placeholder="PM"
                        @endif>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="disabledTextInput">absence cumulé</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $absence->ABS_CUMULE_9 }}">
                    </div>
                </div>
                </div>

                <a  class="btn btn-sm btn-danger" style="    margin-top: -2%;
                margin-left: 663px;
                padding: 5.6px 30px;
                font-size: 14px; " href="{{ route('absenceAdmin.index')}}">retour</a>
            </div>
        </div>
    </div>

@endsection
