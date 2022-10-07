<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Http\Response;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function UserCanSeeAllOrder()
    {
        Order::factory()->count(5)->create();

        $this->getJson(
            route('orders.index'),
        )->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function UserCanSeeOrderWithId()
    {
        $order =  Order::factory()->count(5)->create();
        $number=rand(0,4);

        $response = $this->getJson(
            route('orders.show', $order[$number]->getId()),
        )->assertStatus(Response::HTTP_OK);

        $this->assertEquals($order[$number]->getId(), $response->getOriginalContent()->getId());
        $this->assertEquals($order[$number]->getTotalAmount(), $response->getOriginalContent()->getTotalAmount());
        $this->assertEquals($order[$number]->getDiscount(), $response->getOriginalContent()->getDiscount());

    }

    /**
     * @test
     */
    public function UserCantDeleteOrderWithWrongId()
    {

        $this->deleteJson(
            route('orders.destroy', 15),
        )->assertStatus(Response::HTTP_NOT_FOUND);;
    }


    /**
     * @test
     */
    public function CanNotCreateOrderCheckRequiredFieldParameter()
    {

        $response = $this->postJson(
            route('orders.store'),
            []
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $order = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(Order::TOTAL_AMOUNT, $order);
        $this->assertArrayHasKey(Order::DISCOUNT, $order);
    }

    /**
     * @test
     */
    public function CanNotCreateOrderCheckFieldParameter()
    {
        $response = $this->postJson(
            route('orders.store'),
            [
                Order::TOTAL_AMOUNT => $this->faker->title,
               Order::DISCOUNT => $this->faker->title
            ]
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $order = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(Order::TOTAL_AMOUNT, $order);
        $this->assertArrayHasKey(Order::DISCOUNT, $order);
    }


    /**
     * @test
     */
    public function testUserCanUpdateOrder()
    {
        $order = Order::factory()->create();
        $orderUpdate = Order::factory()->make();

        $response = $this->putJson(
            route('orders.update', $order->getId()),
            [
                Order::TOTAL_AMOUNT => $orderUpdate->getTotalAmount(),
               Order::DISCOUNT => $orderUpdate->getDiscount()
            ]
        )->assertStatus(Response::HTTP_OK);

        $this->assertEquals($order->getTotalAmount(), $response->getOriginalContent()->getTotalAmount());
        $this->assertEquals($order->getDiscount(), $response->getOriginalContent()->getDiscount());
    }

    /**
     * @test
     */
    public function filterOrderByHasDiscount()
    {
        $firstOrder = Order::factory()->create();
        $secondOrder = Order::factory()->create();

        $response = $this->getJson(route('orders.index') . '?discount=' . $firstOrder->getDiscount())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(Order::DISCOUNT, $firstOrder->getDiscount())
        );
        $this->assertFalse(
            $response->getOriginalContent()->contains(Order::DISCOUNT, $secondOrder->getDiscount())
        );
    }

    /**
     * @test
     */
    public function filterOrderByHasTotalAmount()
    {
        $firstOrder = Order::factory()->create();
        $secondOrder = Order::factory()->create();

        $response = $this->getJson(route('orders.index') . '?totalAmount=' . $firstOrder->getTotalAmount())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(Order::TOTAL_AMOUNT, $firstOrder->getTotalAmount())
        );
        $this->assertFalse(
            $response->getOriginalContent()->contains(Order::TOTAL_AMOUNT, $secondOrder->getTotalAmount())
        );
    }
}
