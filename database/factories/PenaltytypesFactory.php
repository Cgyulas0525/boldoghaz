<?php

namespace Database\Factories;

use App\Models\Penaltytypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenaltytypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penaltytypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'businessrate' => $this->faker->randomDigitNotNull,
        'daypenalty' => $this->faker->randomDigitNotNull,
        'daypenaltymax' => $this->faker->randomDigitNotNull,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
