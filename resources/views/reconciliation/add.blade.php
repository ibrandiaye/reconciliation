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
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Reconciliation </a></li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer un reconciliation</h4>
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


                <form class="" action="{{ route('reconciliation.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Montant reconciliation</label>
                        <input type="number" class="form-control" name="montant" value="{{ old('montant') }}" required placeholder="Saisir ici"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Projet</label>
                        <select  class="form-control" id="projet_id" name="projet_id" required >
                            <option value="">Selectionner</option>
                            @foreach($projets as $key => $projet)
                                <option value="{{ $projet->id }}" {{ old('projet_id')==$projet->id ? 'selected' : '' }}>{{ $projet->nom }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Decaissement</label>
                        <select  class="form-control" id="decaissement_id" name="decaissement_id" required >

                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Bureau</label>
                        <select  class="form-control" name="bureau_id" id="bureau_id" required >

                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Affectation</label>
                        <select  class="form-control" name="affectation_id" id="affectation_id" required >

                        </select>
                    </div>
                    <br>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Annuler
                            </button>
                        </div>
                    </div>
                </form>

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

@section('js')
<script>
    $(document).ready(function () {

           // setTimeout(, 2000);
        url_app = '{{ config('app.APP_URL') }}';
        alert(url_app);
        $("#projet_id").change(function () {

            var projet = $("#projet_id").children("option:selected").val();
            var bureau = "<option value=''>Veuillez selectionner</option>";
            var decaissement = "<option value=''>Veuillez selectionner</option>";
            var affectation = "<option value=''>Veuillez selectionner</option>";
            $.ajax({
                type:'GET',
                url: url_app+'/bureau/by/projet/'+projet,

                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {

                    $.each(data,function(index,row){
                        bureau +="<option value="+row.id+">"+row.nom+"</option>";

                    });
                    $("#bureau_id").empty();
                    $("#bureau_id").append(bureau);
                },
                error:function(){

                }
            });
            $.ajax({
                type:'GET',
                url: url_app+'/decaissement/by/projet/'+projet,

                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $.each(data,function(index,row){
                        decaissement +="<option value="+row.id+">"+row.commentaire+"</option>";

                    });
                    $("#decaissement_id").empty();
                    $("#decaissement_id").append(decaissement);

                },
                error:function(){

                }
            });

        });
        $("#decaissement_id").change(function () {
            $.ajax({
                type:'GET',
                url: url_app+'/affectation/by/decaissement/'+projet,

                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $.each(data,function(index,row){
                        affectation +="<option value="+row.id+">"+row.montant+"</option>";

                    });
                    $("#affectation_id").empty();
                    $("#affectation_id").append(affectation);

                },
                error:function(){

                }
            });
        })
    });
</script>

@endsection
