<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayCategorias = array(
            array(
                'nom' => 'Braços',
                'descripcio' => 'Exercicis per treballar músculs dels braços i espatlla'
            ),
            array(
                'nom' => 'Cames',
                'descripcio' => 'Exercicis per treballar tota la musculatura de tren inferior'
            ),
            array(
                'nom' => 'Pit',
                'descripcio' => 'Exercicis per treballar el pit'
            ),
            array(
                'nom' => 'Esquena',
                'descripcio' => 'Exercicis per treballar tota l’esquena'
            ),
            array(
                'nom' => 'Core',
                'descripcio' => 'Exercicis per treballar abdomen i zona lumbar'
            )
        );

        foreach ($arrayCategorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
