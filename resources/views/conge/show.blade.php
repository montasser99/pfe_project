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
                    Conge de {{ $conge->personnels->PERS_NOM . ' ' . $conge->personnels->PERS_PRENOM  }}
                    </div>
                <fieldset disabled style="padding: 3px;
                margin: 10px;">
                    <div class="form-group">
                        <label for="disabledTextInput">Nom</label>
                        <input type="text"  id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->personnels->PERS_NOM }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Prenom</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->personnels->PERS_PRENOM }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Nature de conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->nature_conges->NOM  ?? 'None'}}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">date debut</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_DATE_DEB }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Date fin</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_DATE_FIN }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Nombre de jours de conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_NBRJOUR_93 }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Intérim durant le conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_INTERIM_X20 }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Adresse durant le conge</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_ADRES_X30 }}">
                    </div>
                    <div class="form-group">
                        <label for="disabledTextInput">Phone</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                            placeholder="{{ $conge->CONG_TEL_98 }}">
                    </div>


                </div>
                <a  class="btn btn-sm btn-danger" style="    margin-top: -2%;
                margin-left: 663px;
                padding: 5.6px 30px;
                font-size: 14px; "
                @if(Auth::user()->role=="admin")
                    @if((Auth::user()->personnel_id != $conge->CONG_NUMORD_93))
                href="{{ route('conges.index')}}"
                 @else
                href="{{ route('congeAdmin.index')}}"
                    @endif
               @endif
               @if (Auth::user()->role=='user')
               href="{{ route('conges.index')}}"
               @endif
                >retour</a>

            </div>


        </div>
    </div>

@endsection
