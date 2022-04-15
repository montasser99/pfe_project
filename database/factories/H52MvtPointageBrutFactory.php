<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\H52MvtPointageBrut>
 */
class H52MvtPointageBrutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Matricule' => $this->faker->numberBetween($min = 1, $max =10),
            'JourCptPnt' => $this->faker->dateTime($max = 'now', $timezone = null),
            'DateTimePnt' => $this->faker->dateTime($max = 'now', $timezone = null),
            'OriginePnt' => $this->faker->numberBetween($min = 1, $max = 100),
            'PntSourceID' => $this->faker->domainWord,
            'ValiderPar' => $this->faker->text($maxNbChars = 9),
            'TypeJour' => $this->faker->randomElement($array = array ('cal','vré','ble')) ,
            'TypeOperation' => $this->faker->numberBetween($min = 1, $max = 100),
            'OnPntAnnule' => $this->faker->randomElement( array (101101,11010,01001,001001,11110,01011)),
            'AnnulePar' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'PntCreerPar' => $this->faker->text($maxNbChars = 9),
            'DateCreation' => $this->faker->dateTime($max = 'now', $timezone = null) ,
            'MotifPntManuelH511' => $this->faker->numberBetween($min = 1, $max = 100),
            'Etat' => $this->faker->numberBetween($min = 1, $max = 100),
            'OnCloture' => $this->faker->numberBetween($min = 10, $max = 500),
            'DateCloture' => $this->faker->randomElement($array = array (101101,11010,01001,001001,11110,01011)) ,
            'CloturePar' => $this->faker->text($maxNbChars = 9) ,
        ];
    }
}
