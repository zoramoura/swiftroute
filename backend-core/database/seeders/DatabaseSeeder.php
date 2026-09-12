<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Delivery;
use App\Models\StatusLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $deliveries = Delivery::factory(20)->make()->map(function ($delivery) use ($users) {
            $delivery->sender_id = $users->random()->id;
            $delivery->receiver_id = $users->where('id', '!=', $delivery->sender_id)->random()->id;
            $delivery->save();

            return $delivery;
        });

        $deliveries->each(function ($delivery) {
            StatusLog::factory()->create([
                'delivery_id' => $delivery->id,
            ]);
        });
    }
}
