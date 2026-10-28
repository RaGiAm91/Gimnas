<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['dni','data_naixament','telefon'];

     public function user() {
        return $this->belongsTo(User::class);
        //hasOne() cuando la relacion es 1:1
        //hasMany() cuando la relacion es 1:N
    }

    public function rutinas() {
        return $this->hasMany(Rutina::class);
    }
}
