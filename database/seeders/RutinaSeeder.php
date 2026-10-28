<?php

namespace Database\Seeders;

use App\Models\Rutina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutinaSeeder extends Seeder
{
    private $arrayRutinas = array();
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->arrayRutinas as $rutina) {
            $c = new Rutina;
            $c->nom = $rutina['nom'];
            $c->resum = $rutina['resum'];
            $c->duracio = $rutina['duracio'];
            $c->save();
        }
    }
}
