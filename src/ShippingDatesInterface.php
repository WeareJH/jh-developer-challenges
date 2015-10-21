<?php

namespace Jh\Shipping;

/**
 * Interface ShippingDatesInterface
 * @package Jh\Shipping
 */
interface ShippingDatesInterface
{
    /**
     * @param \DateTime $orderDate
     * @return \DateTime
     */
    public function calculateDeliveryDate(\DateTime $orderDate);
}
