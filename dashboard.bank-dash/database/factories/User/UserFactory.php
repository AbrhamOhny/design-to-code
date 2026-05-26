<?php

namespace Database\Factories\User;

use App\Models\User\User;
use App\Models\User\UserInformation;
use App\Models\User\UserPreference;
use App\Models\User\UserSecurity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory with relations
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $present_address = fake()->address();
            UserInformation::create([
                'user_id' => $user->id,
                'image' => null,
                'fullname' => fake()->name(),
                'date_of_birth' => fake()->dateTimeBetween('-60 years', '-18 years'),
                'present_address' => $present_address,
                'permanent_address' => fake()->randomElement([fake()->address(), $present_address]),
                'city' => fake()->city(),
                'postal_code' => fake()->postcode(),
                'country' => fake()->country()
            ]);

            UserPreference::create([
                'user_id' => $user->id,
                'currency' => 'USD',
                'time_zone' => 'UTC',
                'notification_digital_currency' => false,
                'notification_merchant_order' => false,
                'notification_recommendation' => false,
            ]);

            UserSecurity::create([
                'user_id' => $user->id,
                'two_factor_auth' => false
            ]);
        });
    }
}
