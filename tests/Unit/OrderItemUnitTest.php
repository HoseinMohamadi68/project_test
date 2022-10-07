<?php

namespace Tests\Unit;

use App\Interfaces\Models\Contacts\OrderItemModelInterface;
use App\Models\OrderItem;
use Tests\TestCase;

class OrderItemUnitTest extends TestCase
{
    /**
     * @test
     */
    public function createOrderItem()
    {
        $orderItem = OrderItem::factory()->create();

        $orderCreate = OrderItem::createObject(
            [
                OrderItem::ORDER_ID => $orderItem->getOrderId(),
                OrderItem::COURSE_ID => $orderItem->getCourseId(),
                OrderItem::AMOUNT => $orderItem->getAmount(),
            ]
        );

        $this->assertTrue($orderCreate instanceof OrderItemModelInterface);
        $this->assertEquals($orderCreate->getOrderId(), $orderItem->getOrderId());
        $this->assertEquals($orderCreate->getCourseId(), $orderItem->getCourseId());
        $this->assertEquals($orderCreate->getAmount(), $orderItem->getAmount());

        $this->assertDatabaseHas(
            OrderItem::TABLE,
            [
                OrderItem::ORDER_ID => $orderItem->getOrderId(),
                OrderItem::COURSE_ID => $orderItem->getCourseId(),
                OrderItem::AMOUNT => $orderItem->getAmount(),
            ]
        );

    }

    /**
     * @test
     */
    public function updateOrderItem()
    {
        $orderItem = OrderItem::factory()->create();
        $updatedOrderItem = OrderItem::factory()->make();

        $orderItem->update(
            [
                OrderItem::ORDER_ID => $updatedOrderItem->getOrderId(),
                OrderItem::COURSE_ID => $updatedOrderItem->getCourseId(),
                OrderItem::AMOUNT => $updatedOrderItem->getAmount(),
            ]
        );

        $this->assertTrue($orderItem instanceof OrderItemModelInterface);
        $this->assertEquals($updatedOrderItem->getOrderId(), $orderItem->getOrderId());
        $this->assertEquals($updatedOrderItem->getCourseId(), $orderItem->getCourseId());
        $this->assertEquals($updatedOrderItem->getAmount(), $orderItem->getAmount());

        $this->assertDatabaseHas(
            OrderItem::TABLE,
            [
                OrderItem::ORDER_ID => $updatedOrderItem->getOrderId(),
                OrderItem::COURSE_ID => $updatedOrderItem->getCourseId(),
                OrderItem::AMOUNT => $updatedOrderItem->getAmount(),
            ]
        );
    }
}
