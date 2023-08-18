@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Formulaire de modification</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateproduit') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $p->id }}">
                        <div class="form-group">
                            <label for=""><h5>Libellé</h5></label>
                            <input type="text" value="{{ $p->libelle }}" name="libelle" class="form-control" placeholder="Libellé...">
                        </div>
                        <div class="form-group mt-4">
                            <label for=""><h5>Catégorie</h5></label>
                            <select name="categorie_id" value="{{ $p->categorie_id }}" class="form-control">
                                @foreach($listeCategorie as $lc)
                                    <option value="{{ $lc->id }}">{{ $lc->nomCategorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for=""><h5>Stock</h5></label>
                            <input type="number" value="{{ $p->stock }}" name="stock" class="form-control" min=0>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id  }}" name="user_id">

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
