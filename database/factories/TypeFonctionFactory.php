<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type_fonction>
 */
class TypeFonctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'LIB_TYPE' => $this->faker->randomElement($array = array ('directeur'
            ,'sous-directeur','chef departement','avantage chef département',
            'directeur général','chef service','directeur des RH','directeur financier','directeur marketing'
            )),
            'MONTANT' => $this->faker->randomFloat(),
            'CODF_CNRPS' => $this->faker->stateAbbr,
        ];
    }
}
