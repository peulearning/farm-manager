<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'crmv'
    ];


    public function fazendas(){
        return $this->belongsToMany(related: Fazenda::class);
    }

}

