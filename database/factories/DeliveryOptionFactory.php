<?php

namespace Database\Factories;

use App\Models\DeliveryOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryOption>
 */
class DeliveryOptionFactory extends Factory
{
    protected $model = DeliveryOption::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider' => $this->faker->randomElement(['PostNL', 'DHL', 'DPD', 'UPS']),
            'service' => $this->faker->randomElement(['Standard', 'Mailbox', 'Pallet']),
            'country' => $this->faker->randomElement(['NL', 'BE', 'EU', 'ROW']),
            'weekends' => $this->faker->boolean(),
            'price' => $this->faker->randomFloat(2, 3, 30),
        ];
    }
}
