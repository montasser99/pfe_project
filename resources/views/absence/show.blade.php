@extends('layouts.layout')
@section('content')

<div class="col-md-15">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><h4 style="color:rgb(24, 0, 88)">absence n° {{ $absence->ABS_MAT_95 }}</h4> </h2>
        </div>
        <div class="panel-body">
            <ul class="list-group"  style="color: rgba(0, 76, 99, 0.685)   ">
                <li class="list-group-item" ><h4>ABS_MAT_95 : {{ $absence->ABS_MAT_95 }}</p></h4></li>
                <li class="list-group-item"><h4>ABS_NUMORD_93 : {{ $absence->ABS_NUMORD_93 }}</h4></li>

                <!-- Tester si la variable clé etrangere ou non -->
                @if(isset($absence->ABS_NAT_9))
                <li class="list-group-item"><h4>ABS_NAT_9 : {{ $absence->ABS_NAT_9 }}</h4></li>
                @endif

                <li class="list-group-item"><h4>ABS_CET_9 :    {{ $absence->ABS_CET_9 }}</h4></h4></li>
                <li class="list-group-item"><h4>ABS_DATE_DEB : {{ $absence->ABS_DATE_DEB }}</h4></li>
                <li class="list-group-item"><h4>ABS_PERDEB_X : {{ $absence->ABS_PERDEB_X }}</h4></li>
                <li class="list-group-item"><h4>ABS_DATE_FIN : {{ $absence->ABS_DATE_FIN }}</h4></li>
                <li class="list-group-item"><h4>ABS_PERFIN_X : {{ $absence->ABS_PERFIN_X }}</h4></li>
                <li class="list-group-item"><h4>ABS_NBRJOUR_93 : {{ $absence->ABS_NBRJOUR_93 }}</h4></li>
                <li class="list-group-item"><h4>ABS_CUMULE_9 : {{ $absence->ABS_CUMULE_9 }}</h4></li>
            </ul>
        </div>
    </div>
</div>


@endsection


