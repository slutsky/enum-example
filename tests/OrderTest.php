<?php

namespace Slutsky\EnumExample\Test;

use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\Decision;
use Slutsky\EnumExample\Order;

class OrderTest extends TestCase
{
    public function testSerialization(): void
    {
        $order = new Order(Decision::hold(), 'Some order description');

        $serializedOrder = serialize($order);
        $this->assertIsString($serializedOrder);

        /** @var Order $unserializedOrder */
        $unserializedOrder = unserialize($serializedOrder);
        $this->assertInstanceOf(Order::class, $unserializedOrder);

        $this->assertTrue($order->getDecision() === $unserializedOrder->getDecision());
    }
}
