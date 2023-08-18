<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function listeProduit(){
        try {
            $listeProduit = Produit::all();
            $listeCategorie = Categorie::all();
            return view('produit.liste', ['listeProduit'=>$listeProduit, 'listeCategorie'=>$listeCategorie]);
        } catch (\Exception $e) {
            
        }
    }

    public function addProduit(Request $request){
        try {
            $p = new Produit();
            $p->libelle = $request->libelle;
            $p->categorie_id = $request->categorie_id;
            $p->stock = $request->stock;
            $p->user_id = $request->user_id;
            $res = $p->save();
            if ($p->save()) {
                $sms1 = "Votre Produit a été ajouté... ";
                $listeProduit = Produit::all();
                $listeCategorie = Categorie::all();
                return view('produit.liste', ['listeProduit'=>$listeProduit, 'listeCategorie'=>$listeCategorie, 'sms1'=>$sms1]);
            }else {
                $sms2 = "Votre Produit n'a pas été ajouté... ";
                $listeProduit = Produit::all();
                $listeCategorie = Categorie::all();
                return view('produit.liste', ['listeProduit'=>$listeProduit, 'listeCategorie'=>$listeCategorie, 'sms2'=>$sms2]);
            }
        } catch (\Exception $e) {
            //throw $th;
        }    
    }

    public function editproduit($id){
        $p = Produit::find($id);
        $listeCategorie = Categorie::all();
        return view('produit.modifier', ['listeCategorie'=>$listeCategorie, 'p'=>$p]);
    }

    public function updateproduit(Request $request){
        try {
            $p = Produit::find($request->id);
            $p->libelle = $request->libelle;
            $p->stock = $request->stock;
            $p->categorie_id = $request->categorie_id;
            $p->user_id = $request->user_id;
            $p->save();
            $message = "Produit modifiée...";
            return redirect()->route('listeProduit')->with('success', $message);

        } catch (\Exception $e) {
            $message = "Impossible de modifier ce produit";
            return redirect()->route('listeProduit')->with('success', $message);
        }
    }

    public function delete($id){
        $p = Produit::find($id);
        if($p != null){
            try {
                $p->delete();
                $message = "Produit supprimée";
                return redirect()->route('listeProduit')->with('success', $message);

            } catch(\Exception $e){
                $message = 'Impossible de supprimer car il existe des produits de type '.$p->libelle;
                return redirect()->back()->with('error', $message);
             }
            
        }
        
    }
}
