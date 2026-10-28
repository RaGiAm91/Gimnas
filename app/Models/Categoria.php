<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nom','descripcio'];

        public function exercicis() {
        return $this->hasMany(Exercici::class);
    }
}
