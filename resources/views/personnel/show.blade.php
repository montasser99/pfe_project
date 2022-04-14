@extends('layouts.layout')
@section('content')

<div class="col-md-15">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><h4 style="color:rgb(24, 0, 88)">personnel n° {{ $personnel->PERS_MAT_95 }}</h4> </h2>
        </div>
       <div class="panel-body">
        <ul class="list-group"  style="color: rgba(0, 76, 99, 0.685)   ">
            <li class="list-group-item" ><h4>Matricule : {{ $personnel->PERS_MAT_95 }}</p></h4></li>
            <li class="list-group-item"><h4>Nom : {{ $personnel->PERS_NOM }}</h4></li>
            <li class="list-group-item"><h4>Prenom :    {{ $personnel->PERS_PRENOM }}</h4></h4></li>
            <li class="list-group-item"><h4>Email : {{ $personnel->EMAIL }}</h4></li>
            <li class="list-group-item"><h4>Sexe : {{ $personnel->PERS_SEXE_X }}</h4></li>
            <li class="list-group-item"><h4>Date de naissance : {{ $personnel->PERS_DATE_NAIS }}</h4></li>
            <li class="list-group-item"><h4>Nature agent : {{ $personnel->PERS_NATURAGENT_93 }}</h4></li>

        </ul>
    </div>
</div>
</div>
@endsection
