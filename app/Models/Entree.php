<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;

    protected $fillable = array('produit_id', 'date', 
                                'quantite', 'user_id');

    public static $rules = array(
        'date'=>'required|min:3',
        'produit_id'=>'required|integer',
        'quantite'=>'required|min:3',
        'user_id'=>'required|bigInteger'  
    );

    public function getNomUserAttribute(){
        $u = User::find($this->user_id);
        return $u->name;
    }

    public function getProduitAttribute(){
        $p= Produit::find($this->produit_id);
        return $p->libelle;
    }
}
