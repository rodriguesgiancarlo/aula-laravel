<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cervejaria extends Model
{
    protected $table = 'cervejarias';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'cnpj'];
    protected $visible = ['nome', 'cnpj'];
    public $timestamps = true;


    public function cervejas() {
        return $this->hasMany('App\Cerveja');
    }
    
}
