<?php

namespace Database\Factories;

use App\Models\Emails;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emails::class;

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
            'email' => $this->faker->word,
            'commit' => $this->faker->word,
            'prime' => $this->faker->randomDigitNotNull,
            'active' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
