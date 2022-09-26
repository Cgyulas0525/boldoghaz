<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'table_id' => $this->faker->randomDigitNotNull,
        'parent_id' => $this->faker->randomDigitNotNull,
        'addresstypes_id' => $this->faker->randomDigitNotNull,
        'postcode' => $this->faker->randomDigitNotNull,
        'settlement' => $this->faker->word,
        'address' => $this->faker->word,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
