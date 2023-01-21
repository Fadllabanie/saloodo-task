<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcel>
 */
class ParcelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sender_id'  => 3, // <=== randoms number
            'uuid'  => $this->faker->uuid(),
            'name'  => $this->faker->sentence(),
            'pick_up'  => $this->faker->sentence(),
            'drop_off'  => $this->faker->sentence(),
        ];
    }
}
