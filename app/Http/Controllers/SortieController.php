<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Sortie;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function listeSortie(){
        $listeSortie = Sortie::all();
        $listeProduit = Produit::all();
        return view('sortie.liste', ['listeSortie'=>$listeSortie, 'listeProduit'=>$listeProduit]);
    }

    public function ajoutSortie(Request $request){
        try {
            $sortie = new Sortie();
            $p = Produit::find($request->produit_id);
            /** On vérifie si la quantité disponible en stock est Superieur à la qte à retirer */
            $x = $p->stock;
            $y = $request->quantite;

            if ($x >= $y) {
                $p->stock -= $request->quantite;
                $sortie->produit_id = $request->produit_id;
                $p->save();
                $sortie->quantite = $request->quantite;
                $sortie->user_id = $request->user_id;
                $sortie->date = $request->date;
                $sortie->save();
                $message = "Sortie de Produit effectué";
                return redirect()->route('listeSortie')->with('success', $message);
            }else {
                $message = "Sortie de Produit Non effectuée car il vous reste que ".$p->stock." $p->libelle" ;
                return redirect()->route('listeSortie')->with('error', $message);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editSortie($id){
        $sortie = Sortie::find($id);
        $listeProduit = Produit::all();
        return view('sortie.modifier', ['listeProduit'=>$listeProduit, 'sortie'=>$sortie]);
    }

    public function updateSortie(Request $request){
        $sortie = Sortie::find($request->id);
        $p = Produit::find($request->produit_id);
        /** On vérifie si la quantité disponible en stock est Superieur à la qte à retirer */
        $x = $p->stock;
        $y = $request->quantite;

        if ($x >= $y) {
            $p->stock -= $request->quantite;
            $sortie->produit_id = $request->produit_id;
            $p->save();
            $sortie->quantite = $request->quantite;
            $sortie->user_id = $request->user_id;
            $sortie->date = $request->date;
            $sortie->save();
            return $this->listeSortie();
        }
    }


    public function delete($id){
        try {
            $sortie = Sortie::find($id);
            if($sortie != null){
                $sortie->delete();
            }
            $message = "Suppression effectuée...";
            return redirect()->route('listeSortie')->with('success', $message);

        } catch (\Exception $e) {
            $message = "Suppression non effectuée...";
            return redirect()->route('listeSortie')->with('error', $message);
        }
    }
}
