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
        Schema::create('users_loan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('registered_banks')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('is_active');
            $table->integer('amount');
            $table->double('paid');
            $table->double('installment');
            $table->integer('month_duration');
            $table->timestamps();
        });

        Schema::create('loans_payment_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('users_loan')->cascadeOnDelete();
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
            'users_loan',
            'loans_payment_log',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
