<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Order::TOTAL_AMOUNT => $this->faker->numberBetween(5000,15000),
            Order::DISCOUNT => $this->faker->numberBetween(50,1500),
        ];
    }
}
