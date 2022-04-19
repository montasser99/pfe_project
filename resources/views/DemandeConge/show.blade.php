@extends('layouts.layout')
@section('content')

<div class="col-md-15">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><h4 style="color:rgb(24, 0, 88)">Demande n° {{ $DemandeConge->id }}</h4> </h2>
        </div>
       <div class="panel-body">
        <ul class="list-group"  style="color: rgba(0, 76, 99, 0.685)   ">
            <li class="list-group-item" ><h4>Matricule : {{ $DemandeConge->personnel_id }}</h4></li>
            <li class="list-group-item" ><h4>nom : {{ $DemandeConge->name }}</h4></li>
            <li class="list-group-item"><h4>date debut : {{ $DemandeConge->date_deb }}</h4></li>
            <li class="list-group-item"><h4>date fin :    {{ $DemandeConge->date_fin }}</h4></h4></li>
            <li class="list-group-item"><h4>phone : {{ $DemandeConge->phone }}</h4></li>
            <li class="list-group-item"><h4>nature de conge : {{ $DemandeConge->NatureDeConge }}</h4></li>
            <li class="list-group-item"><h4>Intérim durant le congé : {{ $DemandeConge->interim }}</h4></li>
            <li class="list-group-item"><h4>fonction : {{ $DemandeConge->fonction }}</h4></li>
            <li class="list-group-item"><h4>adresse de conge : {{ $DemandeConge->adresse_conge }}</h4></li>

            <li class="list-group-item"><h4>direction : {{ $DemandeConge->direction }}</h4></li>



        </ul>
    </div>
</div>
</div>
@endsection
