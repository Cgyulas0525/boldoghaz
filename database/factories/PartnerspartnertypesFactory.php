<?php

namespace Database\Factories;

use App\Models\Partnerspartnertypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerspartnertypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partnerspartnertypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partner_id' => $this->faker->randomDigitNotNull,
        'partnertypes_id' => $this->faker->randomDigitNotNull,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
