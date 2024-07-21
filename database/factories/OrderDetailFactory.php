<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id'=>Order::all()->random()->order_id,
            'product_id'=>Product::all()->random()->product_id,
            'quantity'=>fake()->randomNumber(),
            'price'=>fake()->randomFloat(2,1,10),
            
        ];
    }
}
