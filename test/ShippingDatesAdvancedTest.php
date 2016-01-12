<?php

namespace Jh\ShippingTest;

use Jh\Shipping;

/**
 * Class ShippingDatesTest
 * @package Jh\ShippingTest
 */
class ShippingDatesAdvancedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Data provider for test dates
     *
     * @return array
     */
    public function datesProvider()
    {
        return [
            'monday-order'  => [
                'orderDate'     => '2015-10-19 08:23',
                'deliveryDate'  => '2015-10-22'
            ],
            'tuesday-order'  => [
                'orderDate'     => '2015-10-20 16:59',
                'deliveryDate'  => '2015-10-23'
            ],
            'wednesday-order'  => [
                'orderDate'     => '2015-10-21 10:00',
                'deliveryDate'  => '2015-10-26'
            ],
            'thursday-order'  => [
                'orderDate'     => '2015-10-22 16:00',
                'deliveryDate'  => '2015-10-27'
            ],
            'friday-order'  => [
                'orderDate'     => '2015-10-23 10:00',
                'deliveryDate'  => '2015-10-28'
            ],
            'saturday-order'  => [
                'orderDate'     => '2015-10-24 12:00',
                'deliveryDate'  => '2015-10-29'
            ],
            'sunday-order'  => [
                'orderDate'     => '2015-10-25 09:00',
                'deliveryDate'  => '2015-10-29'
            ],
            'monday-order-late'  => [
                'orderDate'     => '2015-10-19 17:00',
                'deliveryDate'  => '2015-10-23'
            ],
            'thursday-order-late'  => [
                'orderDate'     => '2015-10-22 23:59',
                'deliveryDate'  => '2015-10-28'
            ],
            'friday-order-late'  => [
                'orderDate'     => '2015-10-23 18:00',
                'deliveryDate'  => '2015-10-29'
            ],
            'saturday-order-late'  => [
                'orderDate'     => '2015-10-24 17:00',
                'deliveryDate'  => '2015-10-29'
            ],
            'sunday-order-late'  => [
                'orderDate'     => '2015-10-25 09:00',
                'deliveryDate'  => '2015-10-29'
            ]
        ];
    }

    /**
     * @param $orderDate
     * @param $expectedDeliveryDate
     * @dataProvider datesProvider()
     */
    public function testValidDeliveryDates($orderDate, $expectedDeliveryDate)
    {
        $shipping       = new Shipping\ShippingDatesAdvanced();
        $orderDate      = new \DateTime($orderDate);
        $deliveryDate   = $shipping->calculateDeliveryDate($orderDate);
        $this->assertSame($expectedDeliveryDate, $deliveryDate->format('Y-m-d'));
    }
}
