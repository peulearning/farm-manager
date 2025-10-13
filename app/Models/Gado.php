<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class Gado extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'leite',
        'racao',
        'peso',
        'data_nascimento',
        'fazenda_id',
        'vivo',
        'data_abate',
    ];

    public function fazenda()
    {
        return $this->belongsTo(Fazenda::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Limite de animais por fazenda
        static::creating(function ($gado) {
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

        // Validações gerais
        static::saving(function ($gado) {
            $existe = Gado::where('codigo', $gado->codigo)
                ->where('vivo', true)
                ->where('id', '!=', $gado->id)
                ->exists();

            if ($existe && $gado->vivo) {
                throw ValidationException::withMessages([
                    'codigo' => "Já existe um animal vivo com o código '{$gado->codigo}'."
                ]);
            }

            if ($gado->data_nascimento && $gado->data_nascimento > now()) {
                throw ValidationException::withMessages([
                    'data_nascimento' => "A data de nascimento não pode ser no futuro."
                ]);
            }
        });
    }

    // Calcula idade em anos
    public function getIdadeAttribute(): int
    {
        return Carbon::parse($this->data_nascimento)->age;
    }

    // Total de leite por semana (assumindo que o campo 'leite' é diário)
    public function getLeiteSemanaAttribute(): float
    {
        return $this->leite * 7;
    }

    // Total de ração por semana (assumindo que o campo 'racao' é diário)
    public function getRacaoSemanaAttribute(): float
    {
        return $this->racao * 7;
    }

    // Peso em arrobas
    public function getPesoArrobaAttribute(): float
    {
        return $this->peso / 15; // 1 arroba = 15 kg
    }

    // Verifica se o animal pode ser abatido
    public function podeSerAbatido(): bool{
        $idadeAnos = \Carbon\Carbon::parse($this->data_nascimento)->age;
        $racaoPorDia = $this->racao / 7; // usar a coluna 'racao' do DB
        $pesoArroba = $this->peso / 15; // converter kg → arrobas

        return (
            $idadeAnos > 5 ||
            $this->leite < 40 ||
            ($this->leite < 70 && $racaoPorDia > 50) ||
            $pesoArroba > 18
        );
    }

    // Abate o animal
    public function abater(): bool
    {
        if (!$this->podeSerAbatido()) {
            throw new \Exception("❌ Este animal não pode ser abatido, pois não atende aos critérios definidos.");
        }

        $this->vivo = false;
        $this->data_abate = now();
        $this->save();

        return true;
    }
}
