<?php

namespace Jh\Shipping;

/**
 * The service period begins the day after the order is processed unless the order
 * occurs on the weekend, when in which case the order is processed on Monday.
 * Therefore an order on the weekend is delivered within 4 working days including
 * the following Monday, but three working days if the order occurs on a working
 * day.  DELIVERY_PERIOD can be modified to reflect process changes.
 */

/**
 * Class ShippingDates
 * @package Jh\Shipping
 */
class ShippingDates implements ShippingDatesInterface {

    /**
     * @access public
     * @var datetime 
     */
    public $orderDate;

    /**
     * @access public
     * @var datetime 
     */
    public $deliveryDate;

    /**
     * @access protected
     * @var string
     */
    protected $day;

    /**
     * @const
     */
    const DELIVERY_PERIOD = 3;

    /**
     * Constructor
     */
    function __construct() {
        
    }

    /**
     * Destructor
     */
    function __destruct() {
        
    }

    /**
     * @param \DateTime $orderDate
     * @return \DateTime $deliveryDate
     */
    public function calculateDeliveryDate(\DateTime $orderDate) {
        //checks if $orderDate has value set, throws an exception if not
        if (!isset($orderDate)) {
            throw new Exception("Order date has not been set");
        }
        //copies value of $orderDate to set an initial value for $deliveryDate
        $this->deliveryDate = $orderDate;
        //selects day of the week based on values Sunday = 0, Saturday = 6
        switch (date_format($orderDate, "w")) {
            case 0:
                //sets the modifier to an additional day plus the DELIVERY_PERIOD
                $this->deliveryDate->modify('+' . (1 + (self::DELIVERY_PERIOD)) . ' day');
                break;
            case 1:
                //day had to be set in each case as the value was being lost from the object 
                //variable when set outside the switch
                $this->day = 1;
                //calls function to check which day of the week the order was made
                $this->checkWeekendDelivery($this->day);
                break;
            case 2:
                $this->day = 2;
                $this->checkWeekendDelivery($this->day);
                break;
            case 3:
                $this->day = 3;
                $this->checkWeekendDelivery($this->day);
                break;
            case 4:
                $this->day = 4;
                $this->checkWeekendDelivery($this->day);
                break;
            case 5:
                $this->day = 5;
                $this->checkWeekendDelivery($this->day);
                break;
            case 6:
                //sets the modifier to an additional 2 days plus the DELIVERY_PERIOD
                $this->deliveryDate->modify('+' . (2 + (self::DELIVERY_PERIOD)) . ' day');
                break;
            default:
        }
        //returns the calculated delivery date based on the business rules
        return $this->deliveryDate;
    }

    /**
     * @param \integer $testDay
     * 
     */
    private Function checkWeekendDelivery($testDay) {
        $i = 1;
        //performs a loop, adding 3 days to the deliveryDate if it's a Friday to ignore the weekend
        while ($i <= self::DELIVERY_PERIOD) {
            if ($testDay === 5) {
                $testDay = 1;
                $this->deliveryDate->modify('+3 day');
            } else {
                $this->deliveryDate->modify('+1 day');
                $testDay++;
            }
            $i++;
        }
    }

}
