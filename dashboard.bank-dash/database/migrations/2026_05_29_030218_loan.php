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
        Schema::create('loans_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('interest_rate');
        });

        Schema::create('users_loan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('loans_type')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('is_active');
            $table->integer('amount');
            $table->integer('paid');
            $table->integer('installment');
            $table->date('deadline');
            $table->timestamps();
        });

        Schema::create('loans_payment_log', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'loans_type',
            'users_loan',
            'loans_payment_log',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
