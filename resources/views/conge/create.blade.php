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
                        padding: 13px 491px;
                        margin-bottom: 23px;
                        color: aliceblue;">
                        Créer un nouveau conge
                    </div>

                    <div class="panel-body ">

                        <form action="{{ route('conges.store') }}" role="form" method="post">

                            <div class="form-row">
                                @csrf
                                <div class="form-group col-md-6" style="margin-left: -14px;">
                                    <label>Nom</label>
                                    <select class="form-control" name="NomPers" data-prompt-position="topLeft">
                                        <option disabled selected>Selectionner un nom</option>
                                        @foreach ($NomPers as $nom)
                                            <option>{{ $nom->PERS_NOM }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('NomPers')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label>Prenom</label>
                                    <select class="form-control" name="PrenomPers" data-prompt-position="topLeft">
                                        <option disabled selected>Selectionner un prenom</option>
                                        @foreach ($PrenomPers as $prenom)
                                            <option>{{ $prenom->PERS_PRENOM }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">
                                        @error('PrenomPers')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>

                            <div class="form-group "    style="width: 1098px;">
                                <label>Nature de conge</label>
                                <select class="form-control" name="NatureConge" data-prompt-position="topLeft">
                                    <option disabled selected>Sélectionner une nature de conge</option>
                                    @foreach ($NatureConge as $nature)
                                        <option>{{ $nature->NOM }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">
                                    @error('NatureConge')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>

                            <div class="form-group " style="width: 1098px;">
                                <label>Email</label>
                                <select class="form-control" name="email" data-prompt-position="topLeft">
                                    <option disabled selected>Sélectionner un email</option>
                                    @foreach ($Email as $email)
                                        <option>{{ $email->EMAIL }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6" style="margin-left: -14px;">
                                    <label>Date debut</label>
                                    <input type="date" class="form-control" name="date_deb"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('date_deb')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>

                                <div class="form-group col-md-6" style="width: 565px;" >
                                    <label>Date fin</label>
                                    <input type="date" class="form-control" name="date_fin"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('date_fin')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group  col-md-6  " style="margin-left: -14px;">
                                    <label>Intérim durant le congé</label>
                                    <input type="string" class="form-control" name="interim"
                                        placeholder="interim durant le conge" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('interim')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>

                                <div class="form-group col-md-4">
                                    <label>Adresse durant le congé</label>
                                    <input type="string" class="form-control" name="adresse_conge"
                                        placeholder="adresse durant le conge" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('adresse_conge')
                                            {{ $message }}
                                        @enderror
                                    </span>



                                </div>

                                <div class="form-group col-md-2 " style="width: 190px;">
                                    <label>phone</label>
                                    <input type="string" class="form-control" name="phone" placeholder="phone"
                                        data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                           @if(session()->has('erreur'))
                            <span style="color: red">
                                {{ session()->get('erreur') }}
                            </span>
                            @endif

                            @if ($message = Session::get('existeCong'))
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                            @endif
                            <div class="form-actions fluid" >

                                <button type="submit" class="btn btn-success" style="    margin-left: 575px;
                                margin-bottom: -14px;">créer </button>

                            </div>




                        </form>

                        <a class="btn btn-sm btn-danger" style="        margin-top: -2.3%;
                           margin-left: 481px;
                            padding: 4.6px 18px;
                        font-size: 14px; " href="{{ route('conges.index') }}">retour</a>

                    </div> <!-- END: Panel Body -->





                </div>
            </div>


        </div>


    </div>
    <!--END: Content Wrap-->
@endsection
