<?php

namespace Tests\Feature;

use Tests\TestCase;

class DeliveryOptionsTest extends TestCase
{
    protected string $apiBaseUrl = 'http://localhost:88/api/delivery-options';

    /**
     * Test if status is 200.
     */
    public function test_delivery_options_status_ok(): void
    {
        $response = $this->getJson($this->apiBaseUrl);
        $response->assertStatus(200);
    }

    /**
     * Test if the total count of options is 25.
     */
    public function test_delivery_options_count_25(): void
    {
        $response = $this->getJson($this->apiBaseUrl);
        $response->assertJsonCount(25, 'data');
    }

    /**
     * Check if the structure is not changed.
     */
    public function test_delivery_options_structure(): void
    {
        $response = $this->getJson($this->apiBaseUrl);
        $response->assertJsonStructure([
            "data" => [
                0 => [
                    "provider",
                    "service",
                    "country",
                    "weekends",
                    "price"
                ]
            ]
        ]);
    }

    /**
     * Check if the country param is still working and if the validation works.
     */
    public function test_delivery_options_for_country_and_validation(): void
    {
        $responseNL = $this->getJson("$this->apiBaseUrl?country=NL");

        $responseNL->assertJsonPath('data.*.country', [
            0 => 'NL',
            1 => 'NL',
            2 => 'NL',
            3 => 'NL',
            4 => 'NL',
            5 => 'NL',
            6 => 'NL',
            7 => 'NL',
            8 => 'NL',
        ]);

        $responseBE = $this->getJson("$this->apiBaseUrl?country=BE");
        $responseBE->assertJsonPath('data.*.country', [
            0 => 'BE',
            1 => 'BE',
            2 => 'BE',
            3 => 'BE',
            4 => 'BE',
            5 => 'BE',
            6 => 'BE',
            7 => 'BE',
        ]);

        $responseWrongCountry = $this->getJson("$this->apiBaseUrl?country=WrongCountry");
        $responseWrongCountry->assertJson([
            'success' => false,
            'message' => 'Validation error',
            'data' => [
                'country' => [
                    'The selected country is invalid.',
                ],
            ],
        ]);

        $responseWrongCountry->assertJsonFragment([
            'country' => ['The selected country is invalid.'],
        ]);
    }

    /**
     * Check if the package-type param is still working and if the validation works.
     */
    public function test_delivery_options_for_package_type_and_validation(): void
    {
        $response = $this->getJson("$this->apiBaseUrl?package-type=pallet");
        $response->assertJsonPath('data.*.country', [
            0 => 'NL',
            1 => 'NL',
            2 => 'BE',
        ]);

        $responseWrongType = $this->getJson("$this->apiBaseUrl?package-type=brivenbus");
        $responseWrongType->assertJson([
            'success' => false,
            'message' => 'Validation error',
            'data' => [
                'package-type' => [
                    'The selected package-type is invalid.'
                ],
            ],
        ]);

        $responseWrongType->assertJsonFragment([
            'package-type' => ['The selected package-type is invalid.'],
        ]);
    }

    /**
     * Check if the package-type param is still working and if the validation works.
     */
    public function test_delivery_options_for_shipment_date_and_validation(): void
    {
        $response = $this->getJson("$this->apiBaseUrl?shipment-date=17-08-2024");
        $response->assertJsonPath('data.*.country', [
            0 => 'NL',
            1 => 'NL',
            2 => 'BE',
            3 => 'BE',
            4 => 'EU',
            5 => 'NL',
            6 => 'NL',
            7 => 'BE',
            8 => 'BE',
            9 => 'NL',
            10 => 'NL',
            11 => 'BE',
            12 => 'BE',
        ]);

        $responseWrongDate = $this->getJson("$this->apiBaseUrl?shipment-date=2024-08-17");
        $responseWrongDate->assertJson([
            'success' => false,
            'message' => 'Validation error',
            'data' => [
                'shipment-date' => [
                    'The shipment-date field must match the format d-m-Y.',
                ],
            ],
        ]);

        $responseWrongDate->assertJsonFragment([
            'shipment-date' => ['The shipment-date field must match the format d-m-Y.'],
        ]);
    }

    /**
     * Check if combining the params is still working.
     */
    public function test_all_delivery_options_params(): void
    {
        $response = $this->getJson("$this->apiBaseUrl?country=NL&package-type=pallet&shipment-date=17-08-2024");
        $response->assertExactJson([
            'data' => [
                0 => [
                    'provider' => 'DPD',
                    'service' => 'Pallet',
                    'country' => 'NL',
                    'weekends' => 1,
                    'price' => "21.75"
                ],
            ],
        ]);
    }
}
