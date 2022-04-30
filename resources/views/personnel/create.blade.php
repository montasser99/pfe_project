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
                        Créer un nouveau personnel
                    </div>
                    <div class="panel-body ">

                        <form action="{{ route('personnels.store') }}" role="form" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="PERS_NOM" placeholder="Nom"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">

                                        @error('PERS_NOM')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" id="PERS_PRENOM" name="PERS_PRENOM"
                                        placeholder="Prenom" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('PERS_PRENOM')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="EMAIL" placeholder="Email"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('EMAIL')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>mot de passe</label>
                                    <input type="password" class="form-control" name="password" placeholder="mot de passe"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Sexe</label>
                                    <select class="form-control" name="PERS_SEXE_X" data-prompt-position="topLeft">
                                        <option disabled selected> Choisissez un sexe</option>
                                        <option>Homme</option>
                                        <option>Femme</option>
                                    </select>
                                    <span style="color: red">
                                        @error('PERS_SEXE_X')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Role</label>
                                    <select class="form-control" name="RoleUser" data-prompt-position="topLeft">
                                        <option disabled selected>Choisissez un rôle</option>
                                        <option>user</option>
                                        <option>admin</option>
                                    </select>
                                    <span style="color: red">
                                        @error('RoleUser')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Date de naissance</label>
                                    <input type="date" class="form-control" name="PERS_DATE_NAIS"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('PERS_DATE_NAIS')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Nature de conge</label>
                                    <select class="form-control" name="PERS_NATURAGENT_93" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner la nature d'agent</option>
                                        @foreach ($NatureAgent as $nature)
                                            <option>{{ $nature->NATAG_LIB_X50 }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('PERS_NATURAGENT_93')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Type de fonction</label>
                                    <select class="form-control" name="PERS_CODFONC_92" data-prompt-position="topLeft">
                                        <option disabled selected>Sélectionner le type de fonction</option>
                                        @foreach ($TypeFonction as $typeF)
                                            <option>{{ $typeF->LIB_TYPE }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('PERS_CODFONC_92')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="phone"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-actions fluid">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success" style="    margin-left: 400px; margin-right:500px;
                                    margin-bottom: -58px;">créer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a class="btn btn-sm btn-danger" style="        margin-top: 3.1px;
                        margin-left: 450px;
                         padding: 4.6px 15px;
                     font-size: 14px; " href="{{ route('personnels.index') }}">retour</a>
                    </div> <!-- END: Panel Body -->
                </div>
            </div>
        </div>
    </div>
    <!--END: Content Wrap-->
@endsection
