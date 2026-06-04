<?php

namespace Database\Factories\User;

use App\Models\User\UserSecurity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserSecurity>
 */
class UserSecurityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'two_factor_auth' => false,
        ];
    }
}
