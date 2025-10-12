<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gado;
use Illuminate\Validation\ValidationException;

class Fazenda extends Model
{
     use HasFactory;

     protected $fillable = [
         'nome',
         'tamanho',
         'responsavel'
     ];


     public function veterinarios(){
        return $this->belongsToMany(Veterinario::class, 'fazenda_veterinarios');
     }

     public function gados(){
        return $this->hasMany(Gado::class);
     }


     public static function boot(){
        parent::boot();

        static::creating(function ($fazenda) {
            if (self::where('nome', $fazenda->nome)->exists()) {
                throw new \Exception('Já existe uma fazenda com este nome.');
            }
        });

         static::updating(function ($fazenda) {
            if (self::where('nome', $fazenda->nome)
                ->where('id', '!=', $fazenda->id)
                ->exists()) {
                throw ValidationException::withMessages([
                    'nome' => "Já existe uma fazenda com este nome."
                ]);
            }
        });

        static::deleting(function ($fazenda) {
            // Ao deletar uma fazenda, deleta todos os gados associados
            $fazenda->gados()->delete();
            // Remove as associações na tabela pivô
            $fazenda->veterinarios()->detach();
        });
    }
}
