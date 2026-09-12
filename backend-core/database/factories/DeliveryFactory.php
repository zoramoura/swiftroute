<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'tracking_number' => 'SR-' . strtoupper(fake()->unique()->bothify('??###?#')),
            'status' => 'pending',
            'notes' => fake()->optional()->sentence(),
        ];
    }
}