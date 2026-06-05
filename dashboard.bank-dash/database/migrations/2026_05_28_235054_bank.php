<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registered_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receiver_id')->unique()->constrained('transaction_handler')->cascadeOnDelete();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'registered_banks',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
