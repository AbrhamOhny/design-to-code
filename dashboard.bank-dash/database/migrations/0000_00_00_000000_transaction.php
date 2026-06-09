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
        Schema::create('transaction_handler', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('transaction_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('transaction_handler')->cascadeOnDelete();
            $table->foreignId('receiver_id')->constrained('transaction_handler')->cascadeOnDelete();
            $table->double('amount');
            $table->timestamps();
        });
        Schema::create('transaction_mail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_log_id')->constrained('transaction_log')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'transaction_handler',
            'transaction_log',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
