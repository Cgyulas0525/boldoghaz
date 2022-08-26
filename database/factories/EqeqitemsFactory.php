<?php

namespace Database\Factories;

use App\Models\Eqeqitems;
use Illuminate\Database\Eloquent\Factories\Factory;

class EqeqitemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eqeqitems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'equipmenttypes_id' => $this->faker->randomDigitNotNull,
        'eqitems_id' => $this->faker->randomDigitNotNull,
        'valuelimit' => $this->faker->randomDigitNotNull,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
