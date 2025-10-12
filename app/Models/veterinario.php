<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

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


    public static function boot(){
        parent::boot();

        static::creating(function ($veterinario) {

            if (self::where('crmv', $veterinario->crmv)->exists()) {
                throw new \Exception('Já existe um veterinário com este CRMV.');
            }
        });

         static::updating(function ($veterinario) {
            if (self::where('crmv', $veterinario->crmv)
                ->where('id', '!=', $veterinario->id)
                ->exists()) {
                throw ValidationException::withMessages([
                    'crmv' => "Já existe um veterinário com este CRMV."
                ]);
            }
        });


        static::deleting(function ($veterinario) {
            $veterinario->fazendas()->detach();
        });
    }

}

