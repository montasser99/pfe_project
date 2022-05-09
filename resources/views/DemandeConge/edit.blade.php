@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="row">

        <div class="col-md-12" >
        <div class="panel panel-default" style="margin-bottom: 12px;
            margin-left: 60px;
            margin-right: 60px;
            margin-top: 23px;box-shadow: 0 0 30px black; margin-bottom: 30px; ">
                 <div class="panel-heading"
                 style="background-color: #363b5b;
                 padding: 13px 451px;
                 margin-bottom: 23px;
                 color: aliceblue; ">
                 Modifer le demande conge de
                 {{ $DemandeConge->personnels->PERS_NOM . ' ' . $DemandeConge->personnels->PERS_PRENOM }}
                </div>

                <div class="panel-body">
                    <form action="{{ route('Demandeconges.update', $DemandeConge->id) }}" role="form"  method="post" >
                           @csrf
                            @method('PUT')
                            <div class="form-body">

                                <div class="form-group ">
                                    <label>Date debut</label>
                                    <input type="date" class="form-control"  name="date_deb" value="{{ $DemandeConge->date_deb}}"   data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('date_deb')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <label>Date fin</label>
                                    <input type="date" class="form-control"  name="date_fin" value="{{ $DemandeConge->date_fin}}"   data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('date_fin')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <label>nature de conge</label>
                                    <select  class="form-control" name = "NatureDeConge" value="{{ $DemandeConge->NatureDeConge}}"      data-prompt-position="topLeft">
                                        @foreach ( $natureCongee as $nature )
                                        <option>{{ $nature->NOM }}</option>
                                        @endforeach
                                      </select>
                                      <span style="color: red">
                                        @error('NatureDeConge')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <label>Intérim durant le congé</label>
                                    <input type="string" class="form-control"  name="interim" value="{{ $DemandeConge->interim}}"  data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('interim')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <label>fonction</label>
                                    <input type="string" class="form-control"  name="fonction" value="{{ $DemandeConge->fonction}}"   data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('fonction')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <label>direction</label>
                                    <input type="string" class="form-control"  name="direction" value="{{ $DemandeConge->direction}}"  data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('direction')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group ">
                                    <label>Adresse durant le congé</label>
                                    <input type="string" class="form-control"  name="adresse_conge"  value="{{ $DemandeConge->adresse_conge}}"  data-prompt-position="topLeft">
                                    <span style="color: red">
                                        @error('adresse_conge')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-actions fluid" >
                                    <button type="submit" style="padding-top:-30px; margin-left: 540px; padding: 5.6px 20px"
                                        class="btn btn-success">update </button>
                                </div>
                            </div>
                        </form>

                        <a class="btn btn-sm btn-danger" style="           margin-top: -53px;
                        margin-left: 440px;
                        padding: 5.6px 27px;
                        font-size: 14px;
                    }" href="{{ route('Demandeconges.index') }}">Back</a>

                    </div> <!-- END: Panel Body -->
                </div>
            </div>
        </div>
    </div> <!--END: Content Wrap-->
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
