@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update table personnel</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('personnels.update', $personnel->PERS_MAT_95) }}" role="form"  method="post">
                        <div class="form-body">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Matricule</label>
                                <input type="number" class="form-control"  name="PERS_MAT_95"  value="{{ $personnel->PERS_MAT_95}}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control"  name="PERS_NOM"  value="{{ $personnel->PERS_NOM }}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control"  name="PERS_PRENOM"  value="{{ $personnel->PERS_PRENOM }}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"  name="EMAIL" value="{{ $personnel->EMAIL }}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Sexe</label>
                                <input type = "text" class="form-control" name = "PERS_SEXE_X"   value="{{ $personnel->PERS_SEXE_X  }}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Date de naissance</label>
                                <input type = "date" class="form-control" name = "PERS_DATE_NAIS"   value="{{ $personnel->PERS_DATE_NAIS  }}" data-prompt-position="topLeft">
                            </div>

                            <div class="form-group">
                                <label>Nature agent</label>
                                <input type = "text" class="form-control" name = "PERS_NATURAGENT_93"   value="{{ $personnel->PERS_NATURAGENT_93  }}" data-prompt-position="topLeft">
                            </div>

                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-12 text-right">
                           <button type="submit" class="btn btn-info">Update</button>
                            </div>


                        </div>
                    </form>

                </div>  <!-- END: Panel Body -->

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>

                @endif
@endsection
