<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'ingredientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nome'];
    public $timestamps = true;


    /* Retorna todas as cervejas que utilizam esse ingrediente */
    public function cervejas() {
        return $this->belongsToMany('App\Cerveja', 'cervejas_ingredientes', 'cerveja_id', 'ingrediente_id');
    }
    
}
