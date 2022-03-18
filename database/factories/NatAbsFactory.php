<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nat_abs>
 */
class NatAbsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'LIBELLE_ABS' => $this->faker->randomElement($array = array ('FIN DETACHEMENT'
            ,'RADIER','DISPONIBILITE','SANS-SOLDE','SOUS-DRAPEAUX','MALADIE','MAL-NON-PAYEE',
            'MAL-PROFESSIONNELLE','ACCIDENT-TRAVAIL','MATERNITE','IRREGULIERE','DETACHEMENT','SANCTION',
            'DISPONIBILITE-SPECIALE','POST-NATAL','HOSPITALISATION','MI-TEMPS','MAL LONGUE DUREE','CONFINEMENT')),
            'TYPE_ABS' => $this->faker->text($maxNbChars = 9),
            'TYPE_ABS_PR' => $this->faker->numberBetween($min = 1, $max = 10),
            'TYPE_ABS_13' => $this->faker->numberBetween($min = 20, $max = 200),
            'TYPE_ABS_PROD' => $this->faker->numberBetween($min = 30, $max = 3000),
            'TYPE_ABS_CNR' => $this->faker->numberBetween($min = 40, $max = 40000),

        ];
    }
}
