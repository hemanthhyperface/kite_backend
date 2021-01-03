<?php

namespace Database\Factories;

use App\Models\Instrument;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instrument::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instrument_name' => $this->faker->company,
            'exchange' => 'NSE',
            'short_id' => $this->faker->domainWord,
            'cmp' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000) ,
            'open' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000) ,
            'high' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000) ,
            'low' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000) ,
            'close' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000) ,
        ];
    }
}
