<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Articulo::create([
            'numero_registro' => '1',
            'nombre' => 'Martillo',
            'cantidad' => '50',
            'categoria_id' => '1',
        ]);
    }
}
