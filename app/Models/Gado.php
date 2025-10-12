<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Gado extends Model
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

    public static function boot(){
        parent::boot();


        static::creating(function($gado){
            $fazenda = Fazenda::find($gado->fazenda_id);

            if (!$fazenda) {
                throw new \Exception('Fazenda não encontrada.');
            }

            $limite = $fazenda->tamanho * 18;

            $totalAtuais = $fazenda->gados()->count();

            if ($totalAtuais >= $limite) {
                throw ValidationException::withMessages([
                    'fazenda_id' => "A fazenda '{$fazenda->nome}' atingiu o limite máximo de {$limite} animais."
                ]);
            }
        });

        static::saving(function ($gado) {
        $existe = Gado::where('codigo', $gado->codigo)
            ->where('status', 'vivo')
            ->where('id', '!=', $gado->id) // ignora ele mesmo ao atualizar
            ->exists();

        if ($existe && $gado->status === 'vivo') {
            throw ValidationException::withMessages([
                'codigo' => "Já existe um animal vivo com o código '{$gado->codigo}'."
            ]);
        }

        if ($gado->data_nascimento && $gado->data_nascimento > now()){
            throw ValidationException::withMessages([
                'data_nascimento' => "A data de nascimento não pode ser no futuro."
            ]);
        };

    });

    }



}
