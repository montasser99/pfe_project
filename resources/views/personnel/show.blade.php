@extends('layouts.layout')
@section('content')
    <div class="col-md-10" style="padding-right: -83px;
        padding-left: 270px; margin-top: 36px;
        margin-bottom: 75px;">

        <div class="panel panel-default">

            <div class="panel-body" style=" box-shadow: 0 0 15px black; margin-bottom: 30px;">
                <div class="panel panel-primary" style="margin-left: -15px;
                    margin-right: -15px;
                    margin-bottom: 30px;  ">

                    <div class="panel-heading"
                        style="background-color: #363b5b; padding: 13px 322px; margin-bottom: 23px; ">
                        {{ $personnel->PERS_NOM . ' ' . $personnel->PERS_PRENOM }}
                    </div>
                    <fieldset disabled style="padding: 3px;
                    margin: 10px;">

                        <div>
                        <label >Photo de profil</label>
                        <br>
                        <img src="{{ url('public/Image/'.$personnel->users->image) }}"
                        alt="add photo" height="50" class="hidden-sm" style="     margin-left: 260px;
                        width: 191px;
                        height: 280px;">
                        </div>
                        <br>

                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Matricule</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->PERS_MAT_95 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Nom</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->PERS_NOM }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Prenom</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->PERS_PRENOM }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Email</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->EMAIL }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Sexe</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                            @if($personnel->PERS_SEXE_X =='F')
                                placeholder="Femme">
                                @else
                                placeholder="Homme">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Date de naissance</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->PERS_DATE_NAIS }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Nature agent</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->natureAgents->NATAG_LIB_X50 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Type de fonction</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->typeFonction->LIB_TYPE }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">phone</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->PERS_TEL_98 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="disabledTextInput">Role</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $personnel->users->role }}">
                        </div>
                </div>
                <a class="btn btn-sm btn-danger" style="    margin-top: -2%;
                 margin-left: 663px;
                 padding: 5.6px 30px;
                 font-size: 14px; "
                  href="{{ route('personnels.index') }}">retour</a>
            </div>
        </div>
    </div>
@endsection
