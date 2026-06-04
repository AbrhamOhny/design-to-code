<?php

namespace Database\Factories\User;

use App\Models\Card\UserCard;
use App\Models\Investment\UserInvestment;
use App\Models\User\User;
use App\Models\User\UserInformation;
use App\Models\User\UserPreference;
use App\Models\User\UserSecurity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;

    protected array $informationAttributes = [];
    protected array $preferenceAttributes = [];
    protected array $securityAttributes = [];

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
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->information()->create(
                UserInformation::factory()
                    ->make($this->informationAttributes)
                    ->toArray()
            );

            $user->preference()->create(
                UserPreference::factory()
                    ->make($this->preferenceAttributes)
                    ->toArray()
            );

            $user->security()->create(
                UserSecurity::factory()
                    ->make($this->securityAttributes)
                    ->toArray()
            );
        });
    }

    public function withInformation(array $attributes = []): static
    {
        $this->informationAttributes = $attributes;
        return $this;
    }

    public function withPreference(array $attributes = []): static
    {
        $this->preferenceAttributes = $attributes;
        return $this;
    }

    public function withSecurity(array $attributes = []): static
    {

        $this->securityAttributes = $attributes;
        return $this;
    }

    public function withCard(array $attributes = []): static
    {
        return $this->has(UserCard::factory()->state($attributes), 'card');
    }

    public function withInvestment(array $attributes = []): static
    {
        return $this->has(UserInvestment::factory()->state($attributes), 'investment');
    }

}
