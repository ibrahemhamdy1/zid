<?php

namespace App\Interfaces;

interface CourierStrategy
{
    public function createWaybill($data);

    public function printWaybillLabel($waybillId);

    public function trackShipmentStatus($waybillId);

    public function mapStatuses($statuses);

    public function cancel() ;
}
