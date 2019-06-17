<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Retorna todas as permissões desse usuário */
    public function permissoes() {
        return $this->belongsToMany('App\Permissao', 'users_permissoes', 'user_id', 'permissao_id');
    }


    public function hasPermission($p) {
        return (bool) $this->permissoes()->where('slug', strtoupper($p))->count();
    }




    



}
