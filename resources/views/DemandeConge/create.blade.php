@extends('layouts.layout')

@section('content')

<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h3 class="panel-title" >créer une demande de conge</h3>
                </div>
                <div class="panel-body ">

                    <form action="{{ route('Demandeconges.store') }}" role="form"  method="post">

                    <div class="form-body">
                        @csrf

                        <div class="form-group ">
                            <label>Date debut</label>
                            <input type="date" class="form-control"  name="date_deb"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-group ">
                            <label>Date fin</label>
                            <input type="date" class="form-control"  name="date_fin"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-group ">
                            <label>nature de conge</label>
                            <select  class="form-control" name = "NatureDeConge"    data-prompt-position="topLeft">
                                @foreach ( $natureCongee as $nature )
                                <option>{{ $nature->NOM }}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-group ">
                            <label>Intérim durant le congé</label>
                            <input type="string" class="form-control"  name="interim"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-group ">
                            <label>fonction</label>
                            <input type="string" class="form-control"  name="fonction"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-group ">
                            <label>direction</label>
                            <input type="string" class="form-control"  name="direction"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-group ">
                            <label>Adresse durant le congé</label>
                            <input type="string" class="form-control"  name="adresse_conge"   data-prompt-position="topLeft">
                        </div>

                        <div class="form-actions fluid" style="padding-top:30px">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">create </button>
                            </div>
                        </div>


                    </div>
                    </form>

                </div> <!-- END: Panel Body -->


            </div>
        </div>

        <div class="col-md-6">
            <img src="{{asset('public\Image\DemandeConge.jpg')}}" alt="demande conge exemple" width="600px" height=650px >

        </div>

    </div>
</div> <!--END: Content Wrap-->

<style>
    </style>
@endsection






