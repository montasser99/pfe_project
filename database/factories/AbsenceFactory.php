<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'ABS_NUMORD_93' => random_int(1, 10),
            'ABS_NAT_9' => random_int(1, 10),
            'ABS_CET_9' => random_int(0, 9999),
            'ABS_DATE_DEB' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'ABS_PERDEB_X' => $this->faker->randomElement($array = array ('A','M')) ,
            'ABS_DATE_FIN' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'ABS_PERFIN_X' => $this->faker->randomElement($array = array ('A','M')) ,
            'ABS_NBRJOUR_93' => random_int(0, 9999) ,
            'ABS_CUMULE_9' => random_int(0, 9999) ,

        ];
    }
}
