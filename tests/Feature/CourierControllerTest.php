<?php

use Tests\TestCase;

class CourierControllerTest extends TestCase
{
    public function testCreateWaybill()
    {
        $response = $this->get('api/couriers/dhl/waybill');

        $response->assertStatus(200)
            ->assertJson(['message' => 'hello from Dhl createWaybill']);
    }

    public function testPrintWaybillLabel()
    {
        $response = $this->get('api/couriers/dhl/waybill/ABC123/print');

        $response->assertStatus(200)
            ->assertJson(['message' => 'hello from Dhl print Waybill']);
    }

    public function testTrackShipmentStatus()
    {
        $response = $this->get('api/couriers/dhl/waybill/ABC123/status');

        $response->assertStatus(200)
            ->assertJson(['message' => 'hello from Dhl trackShipmentStatus']);
    }

    public function testMapStatuses()
    {
        $response = $this->post('api/couriers/dhl/status-mapping', ['statuses' => ['status1', 'status2']]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'hello from Dhl mapStatuses']);
    }

    public function testCancel()
    {
        $response = $this->post('api/couriers/dhl/cancel');

        $response->assertStatus(200)
            ->assertJson(['message' => 'dhl Do not support canaling']);
    }
}
