<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercici extends Model
{
    protected $fillable = ['nom','descripcio','imatge', 'categoria_id'];
    
    public function rutinas() {
        return $this->belongsToMany(Rutina::class)->withPivot(['series','repeticions']);
        // return $this->belongsToMany(Rutina::class)->withPivot('numeroRepeticions');
    }
    
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}
