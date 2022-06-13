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
            <div class="col-md-4">
                <div class="card-counter primary">
                    <i class="fa fa-venus-mars"></i>
                    <span style="top: 120px;
                        position: absolute;
                        margin-left: 92px; -webkit-text-stroke: thin; font-size: 17px;"><i class="fa fa-male"
                         style="font-size: 1.5em; opacity:1;margin-left: -41px;margin-top: 0px;position:absolute;"></i>Homme :
                        {{ $MaxHomme[0]->MaxHomme }}</span>
                    <span style="top: 160px;
                        position: absolute;
                        margin-left: 92px;  -webkit-text-stroke: thin; font-size: 17px;"><i class="fa fa-female"
                         style="font-size: 1.5em; opacity:1;margin-left: -43px;margin-top: 0px;position:absolute;"></i>Femme :
                        {{ $MaxFomme[0]->MaxFemme }}</span>
                    <!--<span class="count-name" style="top: 170px;">sexe</span>-->

                </div>
            </div>

            <div class="col-md-4" style="margin-left: 80px;">
                <div class="card-counter blueFonce">
                    <i class="fs-clock"></i>
                    <span style="    top: 13px;
                          position: absolute;
                          margin-left: 102px;
                          -webkit-text-stroke: thin;
                          font-size: 16px;">dernier employé à se pointer ce matin :<br><span style="  font-style: italic;">
                            {{ $NomPrenomEntreMatin ?? null}} {{ $dateEntreMatin ?? null }}</span></span>
                    <span style="    top: 65px;
                          position: absolute;
                          margin-left: 102px;
                          -webkit-text-stroke: thin;
                          font-size: 16px;">premier employé pointait durant l'heure du déjeuner :<br><span
                            style="  font-style: italic;">{{ $NomPrenomSortieMatin ?? null }} {{ $dateSorterMatin ?? null }}</span></span>
                    <span style="    top: 120px;
                          position: absolute;
                          margin-left: 60px;
                          -webkit-text-stroke: thin;
                          font-size: 16px;">dernier employé est retourné au travail après le déjeuner :<br><span
                            style="  font-style: italic;">{{ $NomPrenomEntrerMidi ?? null }} {{ $dateEntrerMidi ?? null }}</span></span>
                    <span style="    top: 170px;
                          position: absolute;
                          margin-left: 60px;
                          -webkit-text-stroke: thin;
                          font-size: 16px;">premier employé pointait durant l'heure du sortie :<br> <span
                            style="  font-style: italic;">{{ $NomPrenomSorterMidi ?? null }} {{ $dateSortirMidi ?? null }}</span></span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class=" fs-user-block"></i>

                    <span style="top: 120px;
                        position: absolute;
                        margin-left: 92px;  -webkit-text-stroke: thin; font-size: 17px;"><i class="fa fa-user" style="font-size: 1.5em; opacity:1;margin-left: -41px;margin-top: 0px;position:absolute; color: green"></i>personne present :
                        {{ $present }}</span>
                    <span style="top: 160px;
                        position: absolute;
                        margin-left: 92px; -webkit-text-stroke: thin; font-size: 17px;"><i class="fa fa-user" style="font-size: 1.5em; opacity:1;margin-left: -41px;margin-top: 0px;position:absolute; color:red"></i> personne absent :
                        {{ $NombreAbs }}</span>


                    <span class="count-name"></span>
                </div>
            </div>


        </div>
        <div class="row" style=" margin-bottom: 100px;">
            <div class="col-md-8">


            @include('charts.line', ['AVG_Entrer_Matin'=>$AVG_Entrer_Matin, 'AVG_Sortie_Matin'=>$AVG_Sortie_Matin, 'AVG_Entrer_Midi'=>$AVG_Entrer_Midi, 'AVG_Sortie_Midi'=>$AVG_Sortie_Midi]);
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

    </div>




    <style>
        .card-counter {
            box-shadow: 3px 5px 20px #221e1e;
            margin: 1px;
            padding: 20px 10px;
            background-color: #fff;
            height: 230px;
            width: 280px;
            border-radius: 15px;
            transition: .3s linear all;
        }

        .card-counter:hover {
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #5D8BF4;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #2D31FA;
            color: rgb(255, 255, 255);
        }

        .card-counter.blueFonce {
            background-color: #061367;
            color: #FFF;
            width: 500px;
            margin-left: -148px;
        }


        .card-counter i {
            font-size: 5em;
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
    <script>
const events = [
  {
    summary: 'JS Conference',
    start: {
      date: Calendar.dayjs().format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().format('DD/MM/YYYY'),
    },
    color: {
      background: '#cfe0fc',
      foreground: '#0a47a9',
    },
  },
  {
    summary: 'Vue Meetup',
    start: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
    },
    color: {
      background: '#ebcdfe',
      foreground: '#6e02b1',
    },
  },
  {
    summary: 'Angular Meetup',
    description: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',
    start: {
      date: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY') + ' 10:00',
    },
    end: {
      date: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY') + ' 14:00',
    },
    color: {
      background: '#c7f5d9',
      foreground: '#0b4121',
    },
  },
  {
    summary: 'React Meetup',
    start: {
      date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().add(8, 'day').format('DD/MM/YYYY'),
    },
    color: {
      background: '#fdd8de',
      foreground: '#790619',
    },
  },
  {
    summary: 'Meeting',
    start: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 8:00',
    },
    end: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 12:00',
    },
    color: {
      background: '#cfe0fc',
      foreground: '#0a47a9',
    },
  },
  {
    summary: 'Call',
    start: {
      date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 11:00',
    },
    end: {
      date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 14:00',
    },
    color: {
      background: '#292929',
      foreground: '#f5f5f5',
    },
  }
];

const calendarElement = document.getElementById('calendar');
const calendarInstance = Calendar.getInstance(calendarElement);
calendarInstance.addEvents(events);
    </script>
@endsection








