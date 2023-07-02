<?php

namespace App\Integration;

use App\Interfaces\CourierStrategy;

class DhlShippingStrategy implements CourierStrategy
{
    public function createWaybill($data)
    {
        return 'hello from Dhl createWaybill';
    }

    public function printWaybillLabel($data)
    {
        return 'hello from Dhl print Waybill';
    }

    public function trackShipmentStatus($data)
    {
        return 'hello from Dhl trackShipmentStatus';
    }

    public function mapStatuses($data)
    {
        return 'hello from Dhl mapStatuses';
    }

    public function cancel()
    {
        return 'dhl Do not support canaling';
    }
}
