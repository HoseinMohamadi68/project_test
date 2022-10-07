<?php

namespace Database\Factories\Contacts;

use App\Models\Contacts\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
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
            Order::TYPE => $this->faker->randomElement([Order::MOBILE, Order::PHONE, Order::FAX]),
            Order::NUMBER => $this->faker->phoneNumber
        ];
    }
}
