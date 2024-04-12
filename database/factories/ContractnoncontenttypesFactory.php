<?php

namespace Database\Factories;

use App\Models\Contractnoncontenttypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractnoncontenttypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contractnoncontenttypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'types' => $this->faker->randomDigitNotNull,
            'commit' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
