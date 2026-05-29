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
        Schema::create('investment_party', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('users_investment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('party_id')->constrained('investment_party')->cascadeOnDelete();
            $table->integer('amount');
            $table->date('date_invested');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'investment_party',
            'users_investment',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
