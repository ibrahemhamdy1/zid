<?php

namespace App\Integration;

use App\Interfaces\CourierStrategy;

class AramexShippingStrategy implements CourierStrategy
{
    public function createWaybill($data)
    {
        return 'hello from aramex createWaybill';
    }

    public function printWaybillLabel($data)
    {
        return 'hello from aramex print Waybill';
    }

    public function trackShipmentStatus($data)
    {
        return 'hello from aramex trackShipmentStatus';
    }

    public function mapStatuses($data)
    {
        return 'hello from aramex mapStatuses';
    }

    public function cancel()
    {
        return 'hello from aramex cancel';
    }
}
