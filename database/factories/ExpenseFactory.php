<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Colocation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpenseFactory extends Factory
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
            'payer_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->word(),
            'amount' => fake()->randomFloat(2,1,1000),
            'expense_date' => fake()->date('Y-m-d' , 'now')
        ];
    }
}
