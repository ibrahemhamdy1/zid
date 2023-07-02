# Courier task

## Introduction

Courier is a web application built on Laravel 10.10, utilizing PHP 8.1. It leverages Laravel Sail for easy local development and deployment. This document provides instructions for reviewers on how to set up and run the Rung application.

## Prerequisites

Before you can run the Rung application, make sure you have the following software installed on your machine:

- PHP 8.1
- Composer
- Docker

## Installation

To install and set up the Rung application, follow these steps:

1. Clone the Rung repository from the provided source.

```shell
git clone https://github.com/ibrahemhamdy1/zid.git
```

2. Navigate to the cloned directory.

```shell
cd zid
```

3. Install the project dependencies using Composer.

```shell
composer install
```

4. Copy the example environment file and generate an application key.

```shell
cp .env.example .env
php artisan key:generate
```

5. Set up the database configuration in the `.env` file. Update the following variables to match your local database setup:

6. Start the Laravel Sail development environment using Docker.

```shell
./vendor/bin/sail up
```

7. Migrate the database and seed it with initial data.

```shell
./vendor/bin/sail artisan migrate --seed
```

8. Visit `http://localhost:81x` in your web browser to access the Rung application.

## Development Workflow

When working with the Rung application, follow these guidelines:

- All source code can be found in the `app` directory.
- Routes are defined in `routes/web.php` for web routes and `routes/api.php` for API routes.
- Views are located in `resources/views`.
- Models are located in `app/Models`.
- Controllers can be found in `app/Http/Controllers`.
- Write tests for new features or modifications in the `tests` directory.

## Deployment

To deploy the Rung application to a production environment, follow these steps:

1. Update the production-specific configuration variables in the `.env` file.

2. Build the application assets using Laravel Mix.

```shell
npm install
npm run prod
```

3. Set up your production server environment and configure it to serve the Rung application.

4. Point the web server's document root to the `public` directory of the Rung application.

5. Ensure the web server has appropriate read and write permissions for the storage and cache directories.

6. Set up a process manager, such as Supervisor, to keep the application running continuously.

## Additional Information

For more details on Laravel and Laravel Sail, please refer to the official Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs)

## Conclusion

You have successfully set up the Rung application. If you have any questions or encounter any issues, please don't hesitate to reach out for assistance. Enjoy exploring and reviewing the Rung application!
______________________________________________________
# Courier Controller API Documentation

The Courier Controller API provides endpoints to interact with different courier integrations for creating waybills, printing waybill labels, tracking shipment status, mapping statuses, and canceling shipments.

## Endpoints

### Create Waybill

**Endpoint:**

```
GET /couriers/{courierName}/waybill
```

**Description:**

This endpoint is used to create a new waybill for a shipment with the specified courier.

**Parameters:**

- `courierName` (string, required): The name of the courier for which the waybill needs to be created.

**Request Body:**

The request body is expected to be in JSON format and should contain the data required for creating the waybill.

**Example Request:**

```
GET /couriers/dhl/waybill
Content-Type: application/json

```

**Example Response:**

```
Status: 200 OK
Content-Type: application/json

{
    "message": "hello from Dhl createWaybill"
}
```

---

### Print Waybill Label

**Endpoint:**

```
GET /couriers/{courierName}/waybill/{waybillId}/print
```

**Description:**

This endpoint is used to generate and print the waybill label for a shipment.

**Parameters:**

- `courierName` (string, required): The name of the courier associated with the waybill.
- `waybillId` (string, required): The ID of the waybill for which the label needs to be printed.

**Example Request:**

```
GET /couriers/dhl/waybill/123456789/print
```

**Example Response:**

```
Status: 200 OK
Content-Type: application/json

{
    "message": "'hello from Dhl print Waybill"
}
```

---

### Track Shipment Status

**Endpoint:**

```
GET /couriers/{courierName}/waybill/{waybillId}/status
```

**Description:**

This endpoint is used to track the status of a shipment using its waybill ID.

**Parameters:**

- `courierName` (string, required): The name of the courier associated with the shipment.
- `waybillId` (string, required): The ID of the waybill for which the status needs to be tracked.

**Example Request:**

```
GET /couriers/dhl/waybill/123456789/status
```

**Example Response:**

```
Status: 200 OK
Content-Type: application/json

{
    "message": "hello from Dhl trackShipmentStatus"
}
```

---

### Map Statuses

**Endpoint:**

```
POST /couriers/{courierName}/status-mapping
```

**Description:**

This endpoint is used to map the statuses provided by the courier integration to a standard set of statuses used by the application.

**Parameters:**

- `courierName` (string, required): The name of the courier for which the statuses need to be mapped.

**Request Body:**

The request body is expected to be in JSON format and should contain the courier-specific statuses and their corresponding mapped statuses.

**Example Request:**

```
POST /couriers/dhl/status-mapping
```

**Example Response:**

```
Status: 200 OK
Content-Type: application/json

{
    "message": "hello from Dhl mapStatuses"
}
```

---

### Cancel Shipment

**Endpoint:**

```
POST /couriers/{courierName}/cancel
```

**Description:**

This endpoint is used to cancel a shipment with the specified courier.

**Parameters:**

- `courierName` (string, required): The name of the courier for which the shipment needs to be canceled.

**Request Body:**

The request body is expected to be in JSON format and can contain additional data related to the cancellation.

**Example Request:**

```
POST /couriers/dhl/cancel
Content-Type: application/json


**Example Response:**

    Status: 200 OK
    Content-Type: application/json

    {
        "message": "dhl Do not support canaling"
    }
```
