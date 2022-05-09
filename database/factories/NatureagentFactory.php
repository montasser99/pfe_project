<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Natureagent>
 */
class NatureagentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NATAG_LIB_X50' => $this->faker->randomElement($array = array ('commerciale'
            ,'industrielle','libérale','libérale','gestion des déclarations','forage','Réseau et Développement',
   )),
        ];
    }
}
