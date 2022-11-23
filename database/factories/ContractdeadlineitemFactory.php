<?php

namespace Database\Factories;

use App\Models\Contractdeadlineitem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractdeadlineitemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contractdeadlineitem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contractdeadline_id' => $this->faker->randomDigitNotNull,
        'deadline' => $this->faker->word,
        'performance' => $this->faker->word,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
