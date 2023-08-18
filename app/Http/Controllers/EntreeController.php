<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    public function listeEntree(){
        $listeEntree = Entree::all();
        $listeProduit = Produit::all();
        return view('entree.liste', ['listeEntree'=>$listeEntree, 'listeProduit'=>$listeProduit]);
    }

    public function ajoutEntree(Request $request){
        try {
            $entr = new Entree();
            $entr->produit_id = $request->produit_id;
            $p = Produit::find($request->produit_id);
            $p->stock +=  $request->quantite;
            $p->save();
            $entr->quantite = $request->quantite;
            $entr->user_id = $request->user_id;
            $entr->date = $request->date;
            $entr->save();
            $message = "Entrée de Produit effectué";
            return redirect()->route('listeEntree')->with('success', $message);

        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function editEntree($id){
        $entr = Entree::find($id);
        $listeProduit = Produit::all();
        return view('entree.modifier', ['listeProduit'=>$listeProduit, 'entr'=>$entr]);
    }

    public function updateEntree(Request $request){
        $entr = Entree::find($request->id);
        $entr->produit_id = $request->produit_id;
        $p = Produit::find($request->produit_id);
        $p->stock +=  $request->quantite;
        $p->save();
        $entr->quantite = $request->quantite;
        $entr->user_id = $request->user_id;
        $entr->date = $request->date;
        $entr->save();
        $message = "Entrée de produit modifiée";
        return redirect()->route('listeEntree')->with('success', $message);
    }

    public function delete($id){
        $entree = Entree::find($id);
        if($entree != null){
            $entree->delete();
        }
        return $this->listeEntree();
    }
}
