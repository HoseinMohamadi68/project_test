<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Response;
use Tests\TestCase;

class OrderItemTest extends TestCase
{

    /**
     * @test
     */
    public function UserCanSeeAllOrderItem()
    {
        OrderItem::factory()->count(5)->create();

        $this->getJson(
            route('order_items.index'),
        )->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function UserCanSeeOrderItemWithId()
    {
        $orderItem =  OrderItem::factory()->count(5)->create();

        $number=rand(0,4);

        $response = $this->getJson(
            route('order_items.show', $orderItem[$number]->getId()),
        )->assertStatus(Response::HTTP_OK);

        $this->assertEquals($orderItem[$number]->getId(), $response->getOriginalContent()->getId());
        $this->assertEquals($orderItem[$number]->getOrderId(), $response->getOriginalContent()->getOrderId());
        $this->assertEquals($orderItem[$number]->getAmount(), $response->getOriginalContent()->getAmount());
        $this->assertEquals($orderItem[$number]->getCourseId(), $response->getOriginalContent()->getCourseId());

    }

    /**
     * @test
     */
    public function UserCantDeleteOrderItemWithWrongId()
    {

        $this->deleteJson(
            route('order_items.destroy', 15),
        )->assertStatus(Response::HTTP_NOT_FOUND);;
    }


    /**
     * @test
     */
    public function CanNotCreateOrderItemCheckRequiredFieldParameter()
    {

        $response = $this->postJson(
            route('order_items.store'),
            []
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $orderItem = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(OrderItem::ORDER_ID, $orderItem);
        $this->assertArrayHasKey(OrderItem::AMOUNT, $orderItem);
        $this->assertArrayHasKey(OrderItem::COURSE_ID, $orderItem);
    }

    /**
     * @test
     */
    public function CanNotCreateOrderItemCheckFieldParameter()
    {
        $response = $this->postJson(
            route('order_items.store'),
            [
                OrderItem::ORDER_ID => $this->faker->numberBetween(1,100),
                OrderItem::AMOUNT => $this->faker->title,
                OrderItem::COURSE_ID => $this->faker->title
            ]
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $orderItem = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(OrderItem::ORDER_ID, $orderItem);
        $this->assertArrayHasKey(OrderItem::AMOUNT, $orderItem);
        $this->assertArrayHasKey(OrderItem::COURSE_ID, $orderItem);
    }


    /**
     * @test
     */
    public function testUserCanUpdateOrderItem()
    {
        $orderItem = OrderItem::factory()->create();
        $orderItemUpdate = OrderItem::factory()->make();

        $response = $this->putJson(
            route('order_items.update', $orderItem->getId()),
            [
                OrderItem::ORDER_ID => $orderItemUpdate->getOrderId(),
                OrderItem::COURSE_ID => $orderItemUpdate->getCourseId(),
                OrderItem::AMOUNT => $orderItemUpdate->getAmount()
            ]
        )->assertStatus(Response::HTTP_OK);
        $response->getOriginalContent()->load('order');

        $this->assertEquals($orderItem->getOrderId(), $response->getOriginalContent()->getOrderId());
        $this->assertEquals($orderItem->getAmount(), $response->getOriginalContent()->getAmount());
        $this->assertEquals($orderItem->getCourseId(), $response->getOriginalContent()->getCourseId());
    }

    /**
     * @test
     */
    public function filterOrderItemByHasOrderId()
    {
        $firstOrderItem = OrderItem::factory()->create();
        $orderId=Order::factory()->create();
        $secondOrderItem = OrderItem::factory()->create([OrderItem::ORDER_ID =>$orderId->getId()]);

        $response = $this->getJson(route('order_items.index') . '?order_id =' . $firstOrderItem->getOrderId())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(OrderItem::ORDER_ID, $firstOrderItem->getOrderId())
        );
    }

    /**
     * @test
     */
    public function filterOrderItemByHasAmount()
    {
        $firstOrderItem = OrderItem::factory()->create();
        $secondOrderItem = OrderItem::factory()->create();

        $response = $this->getJson(route('order_items.index') . '?amount=' . $firstOrderItem->getAmount())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(OrderItem::AMOUNT, $firstOrderItem->getAmount())
        );
        $this->assertFalse(
            $response->getOriginalContent()->contains(OrderItem::AMOUNT, $secondOrderItem->getAmount())
        );
    }
}
