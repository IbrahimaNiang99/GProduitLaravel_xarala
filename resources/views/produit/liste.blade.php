@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Liste des produits</h1>
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
                                <th>Libellé</th>
                                <th>Catégorie</th>
                                <th>Stock</th>
                                <th>User</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listeProduit as $lp)
                            <tr>
                                <td class="py-1">{{$lp->id }}</td>
                                <td>{{ $lp->libelle }}</td>
                                <td>{{ $lp->categorie }}</td>
                                <td>{{ $lp->stock }}</td>
                                <td>{{ $lp->nomUser }}</td>
                                <td>
                                    <a href="{{ route ('editproduit',['id'=> $lp->id]) }}" class="btn btn-warning btn-rounded btn-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('deleteProduit',['id'=>$lp->id]) }}" class="btn btn-danger"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h1>Ajout produit</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('addProduit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=""><h5>Libellé</h5></label>
                            <input type="text" required name="libelle" class="form-control" placeholder="Libellé...">
                        </div>
                        <div class="form-group mt-4">
                            <label for=""><h5>Catégorie</h5></label>
                            <select name="categorie_id" id="" class="form-control">
                                @foreach($listeCategorie as $lc)
                                    <option value="{{ $lc->id }}">{{ $lc->nomCategorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for=""><h5>Stock</h5></label>
                            <input required type="number" name="stock" class="form-control" min=0>
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
