<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gados extends Model
{
    use HasFactory;


    protected $fillable = [
        'codigo',
        'leite',
        'racao',
        'peso',
        'nascimento',
        'fazenda_id'
    ];


    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }
}
