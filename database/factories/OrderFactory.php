<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id'=>User::all()->random()->user_id,
            'totalPrice'=>fake()->randomFloat(2,1,15),

        ];
    }
}
