<?php

namespace Database\Factories;

use App\Models\Settlements;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettlementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Settlements::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'settlement' => $this->faker->word,
        'postalcode' => $this->faker->word,
        'county' => $this->faker->word,
        'area' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
