@extends('welcome')
@section('css')

@endsection
@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Projet </a></li>
                </ol>
            </div>
            <h4 class="page-title">Modifier un projet</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {!! Form::model($projet, ['method'=>'PATCH','route'=>['projet.update', $projet->id]]) !!}
            @csrf

                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Nom projet</label>
                        <input type="text" class="form-control" name="nom" value="{{ $projet->nom }}" required placeholder="Saisir ici..."/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Montant</label>
                        <input type="number" class="form-control" name="nom" value="{{ $projet->montant }}" required placeholder="Saisir ici..."/>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Enregistrer
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Annuler
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

@endsection
