@extends('layouts.layout')
@section('content')
    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row" style="margin-top: -64px;">

            <div class="col-md-12" style="margin-left: -249px;
            margin-top: 128px;">
                <div class="panel panel-default"
                    style="margin-bottom: 12px;
                                                        margin-left: 520px;
                                                        margin-right: 60px;
                                                        margin-top: 100px;box-shadow: 0 0 30px black; margin-bottom: 30px; ">
                    <div class="panel-heading" style="background-color: #363b5b;
                                                            padding: 13px 268px;
                                                            margin-bottom: 23px;
                                                            color: aliceblue; ">
                        modification d'un e-mail.
                    </div>

                    <div class="panel-body">
                        <form action="{{  route('updateSig', $Signataire->id) }}" role="form" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-body">

                                <div class="form-group ">
                                    <select class=" form-control" name="email">

                                        @foreach ($Emails as $key => $email)
                                            <option> {{ $email->email }}</option>
                                        @endforeach

                                    </select>
                                    <span style="color: red">
                                        @error('emails')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <input type="hidden" name="Index" value="{{ $indexPage }}">
                                <div class="text-center" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-success"
                                        style="background-color: #092154; border-color: #000000; margin-right: -116px;">Modifier</button>
                                </div>
                                <a class="btn btn-sm btn-danger" style="     margin-top: -54px;
                                margin-left: 241px;
                                padding: 5.6px 18px;
                                font-size: 14px;
                            " href="{{ route('ajouterSignataire',[$indexPage]) }}">Retour</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
