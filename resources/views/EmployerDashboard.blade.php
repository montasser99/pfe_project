@extends('layouts.layout')
@section('content')
<div class="page-header">
    <h1>tableau de bord <small>Bon retour à <span class="text-primary">{{ Auth::user()->name }}</span></small></h1>


    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li class="active">tableau de bord</li>
    </ol>
</div>


<div class="container">
    <div class="row"     style="margin-bottom: 40px;">
        <div class="col-md-3">
            <div class="card-counter red">
                <i class="fa fa-briefcase"></i>
                <span style="top: 13px;
                position: absolute;

                -webkit-text-stroke: thin;
                font-size: 16px;  margin-left: 90px;">Nombre de jours travaillé</span>
                <span style="    margin-top: -90px;
                top: 160px;
                position: absolute;

                -webkit-text-stroke: thin;
                font-size: 17px; margin-left: 150px; font-style: italic;">
                    @if(isset($NombreDeJoursTrav) && ($NombredeJoursTous)) {{$NombreDeJoursTrav}} / {{ $NombredeJoursTous }} jours @endif</span>
                <!--<span class="count-name" style="top: 170px;">sexe</span>-->

            </div>
        </div>

        <div class="col-md-3" >
            <div class="card-counter yellow">
                <i class="fa fa-user-times"></i>
                <span style="    top: 13px;
                      position: absolute;
                      margin-left: 102px;
                      -webkit-text-stroke: thin;
                      font-size: 16px;">Nombre de jour en absence</span>
                      <span style="margin-top: -90px;
                      top: 160px;
                      position: absolute;
                      margin-left: 185px;
                      -webkit-text-stroke: thin;
                      font-size: 17px;  font-style: italic;">
                        @if(isset($NombreAbsence)){{ $NombreAbsence }} jours @endif


            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter green">
                <i class=" fa fa-user-times"></i>

                <span style=" top: 13px;
                position: absolute;
                margin-left: 102px;
                -webkit-text-stroke: thin;
                font-size: 16px;">Nombre de jours en congé</span>
                <span style="
                margin-top: -90px;
                top: 160px;
                position: absolute;
                margin-left: 185px;
                -webkit-text-stroke: thin;
                font-size: 17px; font-style: italic;">
                    @if(isset($NombreConge)){{ $NombreConge }} jours @endif</span>


                <span class="count-name"></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter blue">
                <i class="fa fa-users"></i>

                <span style=" top: 13px;
                position: absolute;
                margin-left: 102px;
                -webkit-text-stroke: thin;
                font-size: 16px;">Nombre de demandes</span>
                <span style="margin-top: -90px;
                top: 150px;
                position: absolute;
                margin-left: 165px;
                -webkit-text-stroke: thin;
                font-size: 17px; font-style: italic;">
                @if(isset($Accepter)&&($Refuser)) Accepter : {{$Accepter}} <br>
                Refuser : {{ $Refuser }}
                @endif
                </span>


                <span class="count-name"></span>
            </div>
        </div>


    </div>
    <div class="row" style=" margin-bottom: 100px;">
        <div class="col-md-8">

    </div>
    @if(isset($JoursFeries))
    <div class="col-md-4">
        <div class="panel panel-danger" style="box-shadow: 3px 5px 20px #221e1e; border-radius: 15px;">
            <div class="panel-heading">
                <h3 class="panel-title">Les jours feriés en attend..</h3>
            </div>
        <table class="table table-striped" style="height: 305px">
            <thead style="
            background-color: #363a5d;">
              <tr class="table-primary">
                <th style=" color:#FFFF; ">Description</th>
                <th style=" color:#FFFF; " >Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($JoursFeries as $jours )
                <tr>
                  <td>{{$jours->description}}</td>
                  <td>{{$jours->dateJoursFeries}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endif
    </div>
    <div class="row" style=" margin-bottom: 100px;">
    <div class="col-md-8" style="margin-top: -478px; ">
    <div class="panel panel-default" style="height:350px">
        <div class="panel-heading">
            <h3 class="panel-title">Votre solde de congé </h3>
            <h5><span style="color:green">Exceptionnel : {{ $Exceptionnel ?? null }} jours </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="color:#00c7e4">Recuperation : {{ $Recuperation ?? null }} jours </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="color:#ff485a">Annuel : {{ $Annuel ?? null }} jours </span>
            </h5>
        </div>
        <div class="panel-body" style="padding:30px" >

            <div class="progress" style="height:30px; margin-bottom: 30px;">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="50" aria-valuemax="" style="width: {{($Exceptionnel/10)*100}}%">
                </div>
            </div>
            <div class="progress"style="height:30px; margin-bottom: 30px;">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{($Recuperation/15)*100}}%">
                </div>
            </div>
            <div class="progress"style="height:30px; margin-bottom: 30px;">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {{($Annuel/25)*100}}%">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

<style>
    .card-counter {
        box-shadow: 3px 5px 20px #221e1e;
        margin: 1px;
        padding: 20px 10px;
        background-color: #fff;
        height: 130px;
        width: 280px;
        border-radius: 15px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.red {
        background-color: #FF6B6B;
        color: #FFF;
    }

    .card-counter.green {
        background-color: #6BCB77;
        color: rgb(255, 255, 255);
    }

    .card-counter.yellow {
        background-color: #FFD93D;
        color: #FFF;
    }

    .card-counter.blue {
        background-color: #4D96FF;
        color: #FFF;
    }

    .card-counter i {
        font-size: 4.5em;
        opacity: 0.3;
        position: absolute;
        margin-left: 5px;
        margin-top: -10px;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 10px;
        font-size: 13px;
        display: block;
    }

    .card-counter .count-numbers2 {
        position: absolute;
        right: 35px;
        top: 60px;
        font-size: 11px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 50px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }





</style>
     @endsection
