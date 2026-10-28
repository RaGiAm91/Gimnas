<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    private $arrayClients = array(
    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->arrayClients as $client) {
             $c = new Client;
             $c->dni = $client['dni'];
             $c->data_naixament = $client['data_naixament'];
             $c->telefon = $client['telefon'];
             $c->save();
         }
    }
}
