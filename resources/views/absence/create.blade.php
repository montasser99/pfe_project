@extends('layouts.layout')

@section('content')
    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default" style="margin-bottom: 12px;
                        margin-left: 60px;
                        margin-right: 60px;
                        margin-top: 23px;box-shadow: 0 0 30px black; margin-bottom: 30px; ">
                    <div class="panel-heading  " style="background-color: #363b5b;
                             padding: 13px 457px;
                         margin-bottom: 23px;
                         color: aliceblue;">
                        Créer un nouveau absence
                    </div>


                    <div class="panel-body ">

                        <form action="{{ route('absences.store') }}" role="form" method="post">

                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Nom</label>
                                    <select class="form-control" name="PERS_NOM" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner un nom</option>
                                        @foreach ($absenceFirstName as $FirstName)
                                            <option>{{ $FirstName->PERS_NOM }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('PERS_NOM')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Prenom</label>
                                    <select class="form-control" name="PERS_PRENOM" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner un prenom</option>
                                        @foreach ($absenceLastName as $LastName)
                                            <option>{{ $LastName->PERS_PRENOM }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('PERS_PRENOM')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <select class="form-control" name="EMAIL" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner un email</option>
                                        @foreach ($ABSemail as $email)
                                            <option>{{ $email->EMAIL }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('EMAIL')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nature d'absence</label>
                                    <select class="form-control" name="LIBELLE_ABS" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner la nature d'absence</option>
                                        @foreach ($absenceNature as $Nature)
                                            <option>{{ $Nature->LIBELLE_ABS }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('LIBELLE_ABS')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-9">
                                    <label>Date Debut</label>
                                    <input type="date" class="form-control" name="ABS_DATE_DEB"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('ABS_DATE_DEB')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>periode debut </label>
                                    <select class="form-control" name="ABS_PERDEB_X" data-prompt-position="topLeft">
                                        <option value="A">AM</option>
                                        <option value="M">PM</option>
                                    </select>
                                    <span style="color: red">
                                        @error('ABS_PERDEB_X')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-9">
                                    <label>date fin</label>
                                    <input type="date" class="form-control" name="ABS_DATE_FIN"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('ABS_DATE_FIN')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>periode fin </label>
                                    <select class="form-control" name="ABS_PERFIN_X" data-prompt-position="topLeft">
                                        <option value="A">AM</option>
                                        <option value="M">PM</option>
                                    </select>
                                    <span style="color: red">
                                        @error('ABS_PERFIN_X')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-actions fluid">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success" style="    margin-left: 430px; margin-right:500px;
                                                margin-bottom: -52px;">créer</button>
                                    </div>
                                </div>



                        </form>
                    </div>
                                <a class="btn btn-sm btn-danger" style="        margin-buttom: 0.3%;
                            margin-left: 455px;
                             padding: 4.6px 18px;
                         font-size: 14px; " href="{{ route('absences.index') }}">retour</a>
                    </div> <!-- END: Panel Body -->
                </div>
            </div>
        </div>
    </div>
    <!--END: Content Wrap-->
@endsection
