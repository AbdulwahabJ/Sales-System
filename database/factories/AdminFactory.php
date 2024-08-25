<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'name' => 'admin',
            'role' => 'admin',
            'com_code' => $this->faker->numberBetween(1, 20),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('admin'),

        ];
    }
}
