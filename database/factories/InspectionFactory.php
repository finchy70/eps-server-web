<?php

namespace Database\Factories;

use App\Models\Inspection;
use Illuminate\Database\Eloquent\Factories\Factory;

class InspectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inspection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => random_int(1,3),
            'user_id' => 1,
            'job_number' => random_int(1111, 9998),
            'site' => $this->faker->city,
            'visible' => random_int(0,1),
            'checked_on' => now(),
        ];
    }
}
