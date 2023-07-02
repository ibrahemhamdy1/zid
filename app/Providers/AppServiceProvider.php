<?php

namespace App\Providers;

use App\Integration\Aramex;
use App\Integration\Shipbox;
use App\Interfaces\CourierStrategy;
use Illuminate\Support\ServiceProvider;
use App\Integration\DhlShippingStrategy;
use App\Integration\AmazonShippingStrategy;
use App\Integration\AramexShippingStrategy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CourierStrategy::class, function ($app) {
            $shippingMethod = request()->courierName ?? 'aramex';

            switch ($shippingMethod) {
                case 'aramex':
                    return new AramexShippingStrategy();
                case 'dhl':
                    return new DhlShippingStrategy();
                default:
                    // Return a default strategy or throw an exception
                    throw new \Exception('Invalid shipping method');
            }
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
