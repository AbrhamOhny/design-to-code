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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('users_information', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->string('fullname');
            $table->date('date_of_birth')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('users_preference', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users')->cascadeOnDelete();
            $table->string('currency')->default('USD');
            $table->string('time_zone')->default('UTC');
            $table->boolean('notification_digital_currency')->default(false);
            $table->boolean('notification_merchant_order')->default(false);
            $table->boolean('notification_recommendation')->default(false);
            $table->timestamps();
        });

        Schema::create('users_security', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users')->cascadeOnDelete();
            $table->boolean('two_factor_auth')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'users',
            'password_reset_tokens',
            'sessions',
            'users_information',
            'users_preference',
            'users_security',
            'users_investment',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        };
    }
};
