<?php

namespace Database\Factories;

use App\Models\Ececitems;
use Illuminate\Database\Eloquent\Factories\Factory;

class EcecitemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ececitems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'energyclassifications_id' => $this->faker->randomDigitNotNull,
            'ecitems_id' => $this->faker->randomDigitNotNull,
            'heatingtypes_id' => $this->faker->randomDigitNotNull,
            'quantity_id' => $this->faker->randomDigitNotNull,
            'piece' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
