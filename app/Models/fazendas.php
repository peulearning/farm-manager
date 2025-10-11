<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fazendas extends Model
{
     use HasFactory;

     protected $fillable = [
         'nome',
         'tamanho',
         'responsavel'
     ];


     public function veterinarios(){
        return $this->belongsToMany(Veterinario::class);
     }

     public function gados(){
        return $this->hasMany(Gado::class);
     }
}
