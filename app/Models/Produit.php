<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = array('libelle', 'categorie_id', 'stock', 'user_id');
    public static $rules = array('libelle'=>'required|min:3',
                                 'categorie_id'=>'required|integer',
                                 'stock'=>'required|integer',
                                 'user_id'=>'required|bigInteger'
                                );

    // public function categories(){
    //     return $this->belongsTo(Categorie::class);
    // }

    public function getNomUserAttribute(){

        $u = User::find($this->user_id);
        return $u->name;
    }

    public function getCategorieAttribute(){

        $c = Categorie::find($this->categorie_id);
        return $c->nomCategorie;
    }
}

