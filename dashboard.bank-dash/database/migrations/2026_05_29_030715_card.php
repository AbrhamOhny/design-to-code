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
        Schema::create('card_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('users_card', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bank_id')->constrained('registered_banks')->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('card_type')->cascadeOnDelete();
            $table->string('name_on_card');
            $table->integer('balance');
            $table->date('valid_thru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'card_type',
            'users_card'
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
