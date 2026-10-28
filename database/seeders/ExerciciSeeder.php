<?php

namespace Database\Seeders;

use App\Models\Exercici;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciciSeeder extends Seeder
{
    private $arrayExercicis = array();
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->arrayExercicis as $exercici) {
            $c = new Exercici;
            $c->nom = $exercici['nom'];
            $c->descripcio = $exercici['descripcio'];
            $c->imatge = $exercici['imatge'];
            $c->save();
        }
    }
}
