<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AdministradorSeeder extends Seeder
{
        
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        DB::table('users')->insert([ 
            'name' => 'Admin',
            'email' => 'admin@admin.cat',
            'password' => Hash::make('admin1234'),
        ]);
    }
}
