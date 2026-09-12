<?php

namespace Database\Factories;

use App\Models\StatusLog;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StatusLog>
 */
class StatusLogFactory extends Factory
{
    protected $model = StatusLog::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'delivery_id' => Delivery::factory(),
            'status' => $this->faker->randomElement(['pending', 'in_transit', 'delivered', 'cancelled']),
            'description' => $this->faker->sentence(),
            'location' => $this->faker->city(),
        ];
    }
}
