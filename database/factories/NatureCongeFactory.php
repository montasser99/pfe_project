<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nature_conge>
 */
class NatureCongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {   $x=$this->faker->randomElement($array = array ('Annuel','Exceptionnel','Recuperation')) ;
        return [
            'NOM' => $x,
            'DESCRIPTION' => 'Conge '.$x ,
        ];

    }
}
