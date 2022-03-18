<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cconge>
 */
class CcongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'CCONG_NAT_9' => $this->faker->numberBetween($min = 1, $max =10),
            'CCONG_CET_9' => $this->faker->numberBetween($min = 10, $max =5000) ,
            'CCONG_DROIT_93' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 999),
            'CCONG_DATE_MAJ' =>$this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'INSERT_DATE' =>$this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'INSERT_USER' => $this->faker->lastName,
            'UPDATE_DATE' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'UPDATE_USER' => $this->faker->userName,

        ];
    }
}
