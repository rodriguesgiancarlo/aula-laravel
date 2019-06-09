<?php

use App\Ingrediente;
use Illuminate\Database\Seeder;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_ing = array('Cevada', 'Malte', 'Lúpulo', 'Milho', 'Água', 'Trigo');

        foreach($arr_ing as $ingrediente) {
            $i = new Ingrediente();
            $i->nome = $ingrediente;
            $i->save();
        }
    }
}
