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
         Schema::table('gados', function (Blueprint $table) {
        $table->boolean('vivo')->default(true);
        $table->timestamp('data_abate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('gados', function (Blueprint $table) {
        $table->dropColumn(['vivo', 'data_abate']);
       });
    }
};
