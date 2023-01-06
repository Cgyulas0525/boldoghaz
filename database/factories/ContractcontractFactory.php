<?php

namespace Database\Factories;

use App\Models\Contractcontract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractcontractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contractcontract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigitNotNull,
        'contract_id' => $this->faker->randomDigitNotNull,
        'partnercontract_id' => $this->faker->randomDigitNotNull,
        'constructionphase_id' => $this->faker->randomDigitNotNull,
        'document_name' => $this->faker->word,
        'document_urt' => $this->faker->word,
        'deadline' => $this->faker->word,
        'settlementdate' => $this->faker->word,
        'amount' => $this->faker->randomDigitNotNull,
        'commit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
