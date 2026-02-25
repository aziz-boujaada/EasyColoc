<?php

namespace Database\Seeders;

use App\Models\ColocationUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColocationUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColocationUsers::factory(5)->create();
    }
}
