<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'tracking_number' => Str::random(10),
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'status' => 'pending',
            'notes' => $this->faker->sentence(),
        ];
    }
}