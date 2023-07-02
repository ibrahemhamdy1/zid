<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CourierStrategy;

class CourierController extends Controller
{
    private $courierIntegration;

    public function __construct(CourierStrategy $courierIntegration)
    {
        $this->courierIntegration = $courierIntegration;
    }

    public function createWaybill(Request $request, string $courierName)
    {
        $waybillData = $request->all();
        $waybill = $this->courierIntegration->createWaybill($waybillData);

        return response()->json(['message' => $waybill]);
    }

    public function printWaybillLabel(string $courierName, string $waybillId)
    {
        // Generate and print the waybill label
        $response = $this->courierIntegration->printWaybillLabel($courierName, $waybillId);

        return response()->json(['message' => $response]);
    }

    public function trackShipmentStatus(string $courierName, string $waybillId)
    {
        $shipmentStatus = $this->courierIntegration->trackShipmentStatus($courierName, $waybillId);

        return response()->json(['message' => $shipmentStatus]);
    }

    public function mapStatuses(Request $request, string $courierName)
    {
        $statuses = $request->all();
        $mappedStatuses = $this->courierIntegration->mapStatuses($statuses);

        return response()->json(['message' => $mappedStatuses]);
    }

    public function cancel(Request $request, string $courierName)
    {
        $cancel = $this->courierIntegration->cancel();

        return response()->json(['message' => $cancel]);
    }
}
