@extends('layouts.layout')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- selec2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="content-wrap">
        <!--START: Content Wrap-->

        <div class="row" style="margin-top: -64px;">

            <div class="col-md-12" style="margin-left: -235px;">
                <div class="panel panel-default" style="margin-bottom: 12px;
                                                margin-left: 520px;
                                                margin-right: 60px;
                                                margin-top: 100px;box-shadow: 0 0 30px black; margin-bottom: 30px; ">
                    <div class="panel-heading" style="background-color: #363b5b;
                                                    padding: 13px 254px;
                                                    margin-bottom: 23px;
                                                    color: aliceblue; ">
                        Ajouter la liste des signataires.
                    </div>


                    <div class="panel-body">
                        <form action="{{ route('storeSig',$demandeur->personnel_id) }}" role="form" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-body">

                                <div class="form-group col-">
                                    <select class="select2-multiple  form-control" name="emails[]" multiple="multiple"
                                        id="select2Multiple">

                                        @foreach ($Emails as $key => $email)
                                            <option value="{{ $email->email }}"> {{ $email->email }}</option>
                                        @endforeach

                                    </select>
                                    <span style="color: red">
                                        @error('emails')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                

                                <div class="text-center" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-success"
                                        style="background-color: #092154; border-color: #000000; margin-right: 6px">Ajouter</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 400px;">
            <div class="message  message--warning" style="margin-left:496px;">
                <p>L'ordre de la liste des signataires est établi selon le premier courriel ajouté.</p>
            </div>
        </div>

    </div>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                tags: true,
                placeholder: "Select a state",
                allowClear: false,
            });
            $("select").on("select2:select", function(evt) {
                var element = evt.params.data.element;
                var $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });
        });
    </script>

    <style>
        .select2-container--default .select2-selection--multiple {
            background-color: #b9b3bd4a;
            border: 1px solid #aaa;
            border-radius: 12px;
            cursor: text;
            padding-bottom: 50px;
            padding-right: 5px;
            position: relative;
        }

        .message {
            background-color: white;
            width: calc(100% - 3em);
            max-width: 24em;
            padding: 1em 1em 1em 1.5em;
            border-left-width: 6px;
            border-left-style: solid;
            border-radius: 3px;
            position: relative;
            line-height: 1.5;
            box-shadow: 0 0 30px black;
        }


        .message:before {
            color: white;
            width: 1.5em;
            height: 1.5em;
            position: absolute;
            top: 1em;
            left: -3px;
            border-radius: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            line-height: 1.5;
            text-align: center;
        }

        .message p {
            margin: 0 0 1em;
        }

        .message p:last-child {
            margin-bottom: 0;
        }

        .message--warning {
            border-left-color: darkorange;
        }

        .message--warning:before {
            background-color: darkorange;
            content: "!";
        }

        html {
            box-sizing: border-box;
        }

    </style>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session()->get('success') }}",
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
@endsection
