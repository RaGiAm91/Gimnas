<?php

namespace App\Models;

use Database\Seeders\AdministradorSeeder;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $fillable = ['nom','resum','duracio'];

    public function client() {
        return $this->belongsTo(Client::class);
    }
    
    public function exercicis() {
        return $this->belongsToMany(Exercici::class)->withPivot(['series','repeticions']);
    }
}
