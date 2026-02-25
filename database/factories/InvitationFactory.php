<?php

namespace Database\Factories;

use App\Models\Colocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colocation_id' => Colocation::factory(),
            'email' => fake()->email(),
            'token' => 'token-' . fake()->unique()->uuid(),
            'status' => fake()->randomElement(['pending' , 'accepted' , 'refused'])
        ];
    }
}
