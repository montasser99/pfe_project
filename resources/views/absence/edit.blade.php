@extends('layouts.layout')

@section('content')
    <div class="content-wrap">
        <!--START: Content Wrap-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default" style="margin-bottom: 12px;
                        margin-left: 60px;
                        margin-right: 60px;
                        margin-top: 23px;box-shadow: 0 0 30px black; margin-bottom: 30px; ">

                    <div class="panel-heading" style="background-color: #363b5b;
                             padding: 13px 451px;
                             margin-bottom: 23px;
                             color: aliceblue; ">
                        Modifier l'absence de
                        {{ $absence->personnels->PERS_NOM . ' ' . $absence->personnels->PERS_PRENOM }}
                    </div>
                    <div class="panel-body">

                        <form action="{{ route('absences.update', $absence->ABS_MAT_95) }}" role="form" method="post">
                            <div class="form-body">
                                @csrf
                                @method('PUT')


                                <div class="form-group col-md-12">
                                    <label>Nature d'absence</label>
                                    <select class="form-control" name="LIBELLE_ABS" data-prompt-position="topLeft">
                                        <option>{{ $absence->natAbs->LIBELLE_ABS }}</option>
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
                                    <input type="date" class="form-control" value="{{ $absence->ABS_DATE_DEB }}"
                                        name="ABS_DATE_DEB" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('ABS_DATE_DEB')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>periode debut </label>
                                    <select class="form-control" name="ABS_PERDEB_X" data-prompt-position="topLeft">
                                        @if ($absence->ABS_PERDEB_X == 'A')
                                            <option value="A">AM</option>
                                            <option value="M">PM</option>
                                        @else
                                            <option value="M">PM</option>
                                            <option value="A">AM</option>
                                        @endif
                                    </select>
                                    <span style="color: red">
                                        @error('ABS_PERDEB_X')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-9">
                                    <label>Date fin</label>
                                    <input type="date" class="form-control" value="{{ $absence->ABS_DATE_FIN }}"
                                        name="ABS_DATE_FIN" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('ABS_DATE_FIN')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>periode fin </label>
                                    <select class="form-control" name="ABS_PERFIN_X" data-prompt-position="topLeft">
                                        @if ($absence->ABS_PERDEB_X == 'A')
                                            <option value="A">AM</option>
                                            <option value="M">PM</option>
                                        @else
                                            <option value="M">PM</option>
                                            <option value="A">AM</option>
                                        @endif
                                    </select>
                                    <span style="color: red">
                                        @error('ABS_PERFIN_X')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>absence cumulé</label>
                                    <input type="number" class="form-control" name="ABS_CUMULE_9"
                                        value="{{ $absence->ABS_CUMULE_9 }}" data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('ABS_CUMULE_9')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                            </div>

                            <div class="form-actions fluid">
                                <button type="submit" style="padding-top:-30px; margin-left: 540px; padding: 5.6px 20px"
                                    class="btn btn-success">Modifier
                                </button>
                            </div>

                        </form>

                        <a class="btn btn-sm btn-danger" style="margin-top: -53px;
                                margin-left: 440px;
                                padding: 5.6px 27px;
                                font-size: 14px;" href="{{ route('absences.index') }}">Retour</a>


                    </div> <!-- END: Panel Body -->

                </div>
            </div>
        </div>
    </div>
    <!--END: Content Wrap-->

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session()->get('success') }}",
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
    @if ($message = Session::get('NotModify'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "{{ session()->get('NotModify') }}",
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
@endsection
