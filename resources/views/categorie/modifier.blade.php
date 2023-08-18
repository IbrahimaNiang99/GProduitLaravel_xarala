@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Formulaire de modification</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateCategorie') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $c->id }}">
                        <div class="form-group">
                            <label for=""><h5>Nom catégorie</h5></label>
                            <input type="text" value="{{ $c->nomCategorie }}"  name="nomCategorie" class="form-control" placeholder="Nom de la catégorie...">
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
