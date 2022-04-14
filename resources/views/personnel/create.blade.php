@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create personnel</h3>
                </div>
                <div class="panel-body ">

                    <form action="{{ route('personnels.store') }}" role="form"  method="post">
                        <div class="form-body">
                            @csrf

                            <div class="form-group">
                                <label>Matricule</label>
                                <input type="number" class="form-control"  name="PERS_MAT_95"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control"  name="PERS_NOM"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control"  name="PERS_PRENOM"   data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"  name="EMAIL"  data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Sexe</label>
                                <input type = "text" class="form-control" name = "PERS_SEXE_X"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Date de naissance</label>
                                <input type = "date" class="form-control" name = "PERS_DATE_NAIS"    data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Nature agent</label>
                                <input type = "text" class="form-control" name = "PERS_NATURAGENT_93"    data-prompt-position="topLeft">
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">create</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- END: Panel Body -->
                @endsection
