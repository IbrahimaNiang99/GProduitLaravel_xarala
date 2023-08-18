@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h2>Liste des sorties</h2>
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
                @if(!empty($sms1))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $sms1 }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(!empty($sms2))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $sms2 }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>date</th>
                                <th>user</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listeSortie as $ls)
                            <tr>
                                <td class="py-1">{{$ls->id }}</td>
                                <td>{{ $ls->produit }}</td>
                                <td>{{ $ls->quantite }}</td>
                                <td>{{ $ls->date }}</td>
                                <td>{{ $ls->nomUser }}</td>
                                <td>
                                    <a href="{{ route('editSortie',['id'=>$ls->id]) }}"  class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('deleteSortie',['id'=>$ls->id]) }}" class="btn btn-danger"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette sortie')">
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
                    <h2>Faites une sortie de produit</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('ajoutSortie') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Produit</label>
                            <select required name="produit_id" id="" class="form-control">
                                @foreach($listeProduit as $lp)
                                    <option value="{{ $lp->id }}">{{ $lp->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Quantité</label>
                            <input required type="number" min=0 name="quantite" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Date</label>
                            <input required type="date" name="date" class="form-control">
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
