<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function listeCategorie(){
        $listeCategorie = Categorie::all();
        return view('categorie.liste', ['listeCategorie'=>$listeCategorie]);
    }

    public function addCategorie(Request $request){
        try {
            $cat = new Categorie();
            $cat->nomCategorie = $request->nomCategorie;
            $cat->save();
            $message = "Catégorie ajoutée...";
            return redirect()->route('listeCategorie')->with('success', $message);

        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function delete($id){
        $cate = Categorie::find($id);
        if($cate != null){
            try {
                $cate->delete();
                $message = "Catégorie supprimée";
                return redirect()->route('listeCategorie')->with('success', $message);

            } catch(\Exception $e){
                $message = 'Impossible de supprimer car il existe des produits de type '.$cate->nomCategorie;
                return redirect()->back()->with('error', $message);
            }
        }
    }

    public function editCategorie($id){
        $c = Categorie::find($id);
        return view('categorie.modifier', ['c'=>$c]);
    }

    public function updateCategorie(Request $request){
       try {
            $c = Categorie::find($request->id);
            $c->nomCategorie = $request->nomCategorie;
            $c->save();
            $message = "Catégorie modifiée avec success...";
        return redirect()->route('listeCategorie')->with('success', $message);

       } catch (Exception $e) {
            $message = 'Impossible de modifier cette catégorie';
            return redirect()->back()->with('error', $message);
       }
    }
}
