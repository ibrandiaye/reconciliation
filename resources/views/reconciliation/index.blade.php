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
            <h4 class="page-title">Liste reconciliation</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable2" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>montant</th>
                        <th>commentaire</th>
                        <th>Projet</th>

                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($reconciliations as $reconciliation)
                            <tr>
                                <td>{{ $reconciliation->id }}</td>
                                <td>{{ $reconciliation->montant }}</td>
                                <td>{{ $reconciliation->decaissement->commentaire }}</td>
                                <td>{{ $reconciliation->bureau->projet->nom }}</td>
                                <td>  <a href="{{ route('reconciliation.edit', $reconciliation->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['reconciliation.destroy', $reconciliation->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Required datatable js -->
<script src=" {{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable2').DataTable();
    } );
</script>

@endsection
