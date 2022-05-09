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
                 modifier la personne {{ $personnel->PERS_NOM.' '.$personnel->PERS_PRENOM }}
                </div>

                <div class="panel-body">
                    <form action="{{ route('personnels.update', $personnel->PERS_MAT_95) }}" role="form"  method="post" enctype="multipart/form-data">
                           @csrf
                            @method('PUT')
                            <div class="form-body">

                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control"  name="PERS_NOM"  value="{{ $personnel->PERS_NOM }}" data-prompt-position="topLeft">
                                <span style="color: red">
                                    @error('PERS_NOM')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control"  name="PERS_PRENOM"  value="{{ $personnel->PERS_PRENOM }}" data-prompt-position="topLeft">
                                <span style="color: red">
                                    @error('PERS_PRENOM')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"  name="EMAIL" value="{{ $personnel->EMAIL }}" data-prompt-position="topLeft">
                                <span style="color: red">
                                    @error('EMAIL')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Sexe</label>
                                <select  class="form-control" name = "PERS_SEXE_X" value={{ $personnel->PERS_SEXE_X }}   data-prompt-position="topLeft">
                                    <option>Homme</option>
                                    <option>Femme</option>
                                  </select>
                                  <span style="color: red">
                                    @error('PERS_SEXE_X')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select  class="form-control" name = "RoleUser"  data-prompt-position="topLeft">
                                    @if($personnel->users->role == 'user')
                                    <option >user</option>
                                    <option>admin</option>
                                    @else
                                    <option >admin</option>
                                    <option>user</option>
                                    @endif
                                  </select>
                                  <span style="color: red">
                                    @error('RoleUser')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Date de naissance</label>
                                <input type = "date" class="form-control" name = "PERS_DATE_NAIS"   value="{{ $personnel->PERS_DATE_NAIS  }}" data-prompt-position="topLeft">
                                <span style="color: red">
                                    @error('PERS_DATE_NAIS')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>

                            <div class="form-group">
                            <label>phone</label>
                            <input type = "text" class="form-control" name = "phone" value={{ $personnel->PERS_TEL_98 }} placeholder="phone"    data-prompt-position="topLeft">
                            <span style="color: red">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>

                            <div class="form-group">
                                <label>Nature d'agent</label>
                                <select class="form-control" name="PERS_NATURAGENT_93"  data-prompt-position="topLeft">
                                    <option>{{ $personnel->natureAgents->NATAG_LIB_X50 }}</option>
                                    @foreach ($Nature as $nature)
                                        <option>{{ $nature->NATAG_LIB_X50 }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">
                                    @error('PERS_NATURAGENT_93')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                            <label>Type de fonction</label>
                            <select class="form-control" name="PERS_CODFONC_92"  data-prompt-position="topLeft">
                                <option>{{ $personnel->typeFonction->LIB_TYPE}}</option>
                                @foreach ($TypeF as $typeF)
                                    <option>{{ $typeF->LIB_TYPE }}</option>
                                @endforeach
                            </select>
                            <span style="color: red">
                                @error('PERS_CODFONC_92')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>

                        </div>

                        <div class="form-actions fluid" >
                            <button type="submit" style="padding-top:-30px; margin-left: 540px; padding: 5.6px 20px"
                                class="btn btn-success">Modifier
                            </button>
                        </div>

                    </form>

                    <a class="btn btn-sm btn-danger" style="margin-top: -53px;
                    margin-left: 440px;
                    padding: 5.6px 27px;
                    font-size: 14px;
                                      "
                                      href="{{ route('personnels.index') }}">Retour</a>


                </div>  <!-- END: Panel Body -->

            </div>
        </div>
    </div>
</div> <!--END: Content Wrap-->

@if ($message = Session::get('NotModify'))

<script>
Swal.fire({
  icon: 'warning',
  title: '{{ session()->get('NotModify') }}',
})
</script>
    @endif

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

@endsection
