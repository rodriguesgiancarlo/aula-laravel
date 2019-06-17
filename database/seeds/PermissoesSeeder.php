<?php

use App\Permissao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = array(
            'ADMINISTRADOR',
            'USUÁRIO',
            'GERENTE'
        );


        DB::transaction(function () use ($permissoes) {
            foreach($permissoes as $perm) {
                $p = new Permissao();
                $p->slug = $perm;
                $p->save();
            }
        });


    }
}
