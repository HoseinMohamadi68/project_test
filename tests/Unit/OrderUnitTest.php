<?php

namespace Tests\Unit;

use App\Interfaces\Models\Contacts\CourseInterface;
use App\Interfaces\Models\Contacts\OrderModelInterface;
use App\Models\Course;
use App\Models\Order;
use Tests\TestCase;

class OrderUnitTest extends TestCase
{
    /**
     * @test
     */
    public function createOrder()
    {
        $order = Order::factory()->create();

        $orderCreate = Order::createObject(
            [
                Order::TOTAL_AMOUNT => $order->getTotalAmount(),
                Order::DISCOUNT => $order->getDiscount(),
            ]
        );

        $this->assertTrue($orderCreate instanceof OrderModelInterface);
        $this->assertEquals($orderCreate->getTotalAmount(), $order->getTotalAmount());
        $this->assertEquals($orderCreate->getDiscount(), $order->getDiscount());

        $this->assertDatabaseHas(
            Order::TABLE,
            [
                Order::TOTAL_AMOUNT => $order->getTotalAmount(),
                Order::DISCOUNT => $order->getDiscount(),
            ]
        );

    }

    /**
     * @test
     */
    public function updateOrder()
    {
        $order = Order::factory()->create();
        $updatedOrder = Order::factory()->make();

        $order->update(
            [
                Order::TOTAL_AMOUNT => $updatedOrder->getTotalAmount(),
               Order::DISCOUNT => $updatedOrder->getDiscount(),
            ]
        );

        $this->assertTrue($order instanceof OrderModelInterface);
        $this->assertEquals($updatedOrder->getTotalAmount(), $order->getTotalAmount());
        $this->assertEquals($updatedOrder->getDiscount(), $order->getDiscount());

        $this->assertDatabaseHas(
            Order::TABLE,
            [
                Order::TOTAL_AMOUNT => $updatedOrder->getTotalAmount(),
               Order::DISCOUNT => $updatedOrder->getDiscount(),
            ]
        );
    }
}
