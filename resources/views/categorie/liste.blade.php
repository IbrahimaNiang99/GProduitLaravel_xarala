@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h1>Liste des categories</h1>
                </div>
                <div class="card-body"> 
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom catégorie</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listeCategorie as $lc)
                            <tr>
                                <td class="py-1">{{$lc->id }}</td>
                                <td>{{ $lc->nomCategorie }}</td>
                                <td>
                                    <a href="{{ route('editCategorie',['id'=>$lc->id]) }}" class="btn btn-primary btn-rounded btn-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('deleteCategorie',['id'=>$lc->id]) }}" class="btn btn-danger"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h1>Ajout catégorie</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('addCategorie') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=""><h5>Nom catégorie</h5></label>
                            <input type="text" name="nomCategorie" class="form-control" required placeholder="Nom de la catégorie...">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="reset" class="ml-4 btn btn-danger ">Annuler</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
