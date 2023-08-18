@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Formulaire de modification d'entrée de produit</h2>
                </div>
                <div class="card-body h5">
                    <form action="{{ route('updateEntree') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $entr->id }}">
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
                            <input type="number" value="{{ $entr->quantite }}" min=0 name="quantite" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Date</label>
                            <input type="date" value="{{ $entr->date }}" name="date" class="form-control">
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
