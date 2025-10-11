<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->decimal('leite', 8, 2);
            $table->decimal('racao', 8, 2);
            $table->decimal('peso', 8, 2);
            $table->date('data_nascimento');
            $table->foreignId('fazenda_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gados');
    }
};
