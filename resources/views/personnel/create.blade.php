@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Créer un nouveau personnel</h3>
                </div>
                <div class="panel-body ">

                    <form action="{{ route('personnels.store') }}" role="form"  method="post">
                          @csrf
                          <div class="form-row">


                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" class="form-control"  name="PERS_NOM"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Prenom</label>
                                <input type="text" class="form-control"  name="PERS_PRENOM"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control"  name="EMAIL"  data-prompt-position="topLeft">
                            </div>

                            <div class="form-group col-md-6">
                                <label>mot de passe</label>
                                <input type="password" class="form-control"  name="password"  data-prompt-position="topLeft">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Sexe</label>
                                <select  class="form-control" name = "PERS_SEXE_X"    data-prompt-position="topLeft">
                                    <option selected>H</option>
                                    <option>F</option>
                                  </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <select  class="form-control" name = "RoleUser"    data-prompt-position="topLeft">
                                    <option selected>user</option>
                                    <option>admin</option>
                                  </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date de naissance</label>
                                <input type = "date" class="form-control" name = "PERS_DATE_NAIS"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nature agent</label>
                                <input type = "text" class="form-control" name = "PERS_NATURAGENT_93"    data-prompt-position="topLeft">
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary active" >create</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- END: Panel Body -->
                <style>
                    .footer

                    {
                    background-color: #fff;
                    height: 10px;
                    position: absolute;
                    bottom: -210px;
                    right: 0;
                    left: 0px;
                    padding: 15px;
                    border-top: 1px solid #f0f3f5;
                    }

             </style>
                @endsection

