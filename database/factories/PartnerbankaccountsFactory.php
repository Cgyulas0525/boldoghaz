<?php

namespace Database\Factories;

use App\Models\Partnerbankaccounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerbankaccountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partnerbankaccounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partners_id' => $this->faker->randomDigitNotNull,
        'financialinstitutions_id' => $this->faker->randomDigitNotNull,
        'accountnumber' => $this->faker->word,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
