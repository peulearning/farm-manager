<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Veterinario;
use App\Models\Fazenda;
use App\Models\Gado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um usuário fixo para login de teste
        User::factory()->create([
            'name' => 'Pedro Henrique',
            'email' => 'pedro@ifnmg.edu.br',
        ]);

        // Cria 5 veterinários
        $veterinarios = Veterinario::factory(5)->create();

        // Para cada veterinário, cria entre 1 e 3 fazendas associadas
        $veterinarios->each(function ($veterinario) {
            $fazendas = Fazenda::factory(rand(1, 3))->create();

            // Associa o veterinário às fazendas criadas
            $veterinario->fazendas()->attach($fazendas->pluck('id'));

            // Para cada fazenda, cria entre 5 e 10 gados
            $fazendas->each(function ($fazenda) {
                Gado::factory(rand(5, 10))->create([
                    'fazenda_id' => $fazenda->id,
                ]);
            });
        });

        $this->command->info('✅ Banco populado com sucesso!');
    }
}
