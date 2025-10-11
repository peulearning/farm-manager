<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'crmv'
    ];


    public function fazendas(){
        return $this->belongsToMany(Fazenda::class, 'fazenda_veterinarios');
    }

}

