@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Formulaire de modification d'entrée de produit</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('updateSortie') }}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{ $sortie->id }}">
                        <div class="form-group">
                            <label for="">Produit</label>
                            <select name="produit_id" id="" class="form-control">
                                @foreach($listeProduit as $lp)
                                    <option value="{{ $lp->id }}">{{ $lp->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Quantité</label>
                            <input value="{{ $sortie->quantite }}" type="number" min=0 name="quantite" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Date</label>
                            <input value="{{ $sortie->date }}" type="date" name="date" class="form-control">
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group mt-4">
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
