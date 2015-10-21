<?php

namespace Jh\ShippingTest;

use Jh\Shipping;

/**
 * Class ShippingDatesTest
 * @package Jh\ShippingTest
 */
class ShippingDatesTest extends \PHPUnit_Framework_TestCase
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
                'orderDate'     => '2015-10-19',
                'deliveryDate'  => '2015-10-22'
            ],
            'tuesday-order'  => [
                'orderDate'     => '2015-10-20',
                'deliveryDate'  => '2015-10-23'
            ],
            'wednesday-order'  => [
                'orderDate'     => '2015-10-21',
                'deliveryDate'  => '2015-10-26'
            ],
            'thursday-order'  => [
                'orderDate'     => '2015-10-22',
                'deliveryDate'  => '2015-10-27'
            ],
            'friday-order'  => [
                'orderDate'     => '2015-10-23',
                'deliveryDate'  => '2015-10-28'
            ],
            'saturday-order'  => [
                'orderDate'     => '2015-10-24',
                'deliveryDate'  => '2015-10-29'
            ],
            'sunday-order'  => [
                'orderDate'     => '2015-10-25',
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
        $shipping       = new Shipping\ShippingDates();
        $orderDate      = new \DateTime($orderDate);
        $deliveryDate   = $shipping->calculateDeliveryDate($orderDate);
        $this->assertSame($expectedDeliveryDate, $deliveryDate->format('Y-m-d'));
    }
}
