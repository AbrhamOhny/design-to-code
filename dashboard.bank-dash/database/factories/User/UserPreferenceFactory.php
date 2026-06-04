<?php

namespace Database\Factories\User;

use App\Models\User\UserPreference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserPreference>
 */
class UserPreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'currency' => 'USD',
            'time_zone' => 'UTC',
            'notification_digital_currency' => false,
            'notification_merchant_order' => false,
            'notification_recommendation' => false,
        ];
    }
}
