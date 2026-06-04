<?php

namespace Database\Factories\User;

use App\Models\User\UserInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserInformation>
 */
class UserInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $present_address = fake()->address();
        return [
            'image' => null,
            'fullname' => fake()->name(),
            'date_of_birth' => fake()->dateTimeBetween('-60 years', '-18 years'),
            'present_address' => $present_address,
            'permanent_address' => fake()->randomElement([fake()->address(), $present_address]),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
        ];
    }
}
