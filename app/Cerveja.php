<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveja extends Model
{
    protected $table = 'cervejas';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'cervejaria_id'];
    protected $visible = ['nome', 'cervejaria_id'];
    protected $with = ['cervejaria'];
    public $timestamps = true;


    public function cervejaria() {
        return $this->hasOne('App\Cervejaria', 'id', 'cervejaria_id');
    }


    public function ingredientes() {
        return $this->belongsToMany('App\Ingrediente', 'cervejas_ingredientes', 'cerveja_id', 'ingrediente_id');
    }
}
