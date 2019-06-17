<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';
    protected $primaryKey = 'id';
    protected $fillable = ['slug'];
    public $timestamps = true;



    /* FUNÇÃO MUTATOR
     *
     * Toda vez que um registro for inserido no banco de dados, o valor do campo Slug será 
     * convertido para maiúsculo.
     * 
     * Ler sobre em: https://laravel.com/docs/5.8/eloquent-mutators#accessors-and-mutators
     */
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtoupper($value);
    }





    public function usuarios() {
        return $this->belongsToMany('App\User', 'users_permissoes', 'user_id', 'permissao_id');
    }
}
