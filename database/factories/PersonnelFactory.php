<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'PERS_NOM_X40' =>$this->faker->word ,
            'PERS_NOM' =>$this->faker->word ,
            'PERS_PRENOM' =>$this->faker->word ,
            'PERS_NUMASS_94' => random_int(0, 9999),
            'PERS_CODFONC_92' => random_int(1000, 9999),
            'PERS_CODGROUP_92' => random_int(1000, 9999),
            'PERS_CET_9' => $this->faker->randomDigitNot(0),
            'PERS_ENFANT_92' => $this->faker->randomDigitNot(0),
            'PERS_ENFSOC_9' => $this->faker->randomDigitNot(0),
            'PERS_ENFISC_9' => $this->faker->randomDigitNot(0),
            'PERS_TEL_98' => $this->faker->randomDigitNot(0),
            'PERS_CONDLOGE_9' => $this->faker->randomDigitNot(0),
            'PERS_MONTALLFAM_95' => $this->faker->randomDigitNot(0),
            'PERS_MONTSALUNIQ_95' => $this->faker->randomDigitNot(0),
            'PERS_NUMLETREC_95' => $this->faker->randomDigitNot(0),
            'PERS_ECHELREC_92' => $this->faker->randomDigitNot(0),
            'PERS_CHELONREC_92' => $this->faker->randomDigitNot(0),
            'PERS_ECHELCONF_92' => $this->faker->randomDigitNot(0),
            'PERS_SITAGEN_9' => $this->faker->randomDigitNot(0),
            'PERS_CATPERS_9' => $this->faker->randomDigitNot(0),
            'PERS_NATPERS_9' => $this->faker->randomDigitNot(0),
            'PERS_ORDING_9' => $this->faker->randomDigitNot(0),
            'PERS_CODPAI_9' => $this->faker->randomDigitNot(0),
            'PERS_EXPERTISE_92' => $this->faker->randomDigitNot(0),
            'PERS_NUMCOMPT_X15' => $this->faker->randomDigitNot(0),
            'PERS_CODBANK_92' => $this->faker->randomDigitNot(0),
            'PERS_CODAGENC_93' => $this->faker->randomDigitNot(0),
            'PERS_SALBASE_96' => $this->faker->randomDigitNot(0),
            'PERS_SEXE_X' => $this->faker->randomElement($array = array ('H','F')) ,
            'PERS_ETACIVIL_X' => $this->faker->randomElement($array = array ('M','S')),
            'PERS_NJFILLE_X20' => $this->faker->word ,
            'PERS_CODECHEFFAMIL_X' => $this->faker->randomElement($array = array ('M','S')),
            'PERS_LNAIS_X16' => $this->faker->word ,
            'PERS_PIDENTNUM_X13' => $this->faker->bothify('############') ,
            'PERS_PIDENTLEMIS_X12' => $this->faker->bothify('###########') ,
            'PERS_ADR_X60' => $this->faker->address ,
            'PERS_NATION_X16' => $this->faker->word ,
            'PERS_GSANG_X3' => $this->faker->bothify('###')  ,
            'PERS_NOMCONJ_X40' => $this->faker->word ,
            'PERS_LNAISCONJ_X16' => $this->faker->word ,
            'PERS_PROFCONJ_X25' => $this->faker->word ,
            'PERS_EMPLCONJ_X30' => $this->faker->word ,

            'PERS_QUALIF_X45' => $this->faker->word ,
            'PERS_NUMCNSS_X16' => $this->faker->word ,
            'PERS_NUMCNR_X10' => $this->faker->word ,
            'PERS_AFFECT_92' => $this->faker->bothify('##'),
            'PERS_CENTRECOUT_94' => $this->faker->bothify('#####'),
            'PERS_DATE_NAIS' => $this->faker->date($format = 'Y-m-d', $max = '2001/1/1') ,
            'PERS_PIDENT_DATE_EMIS' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'PERS_DATE_NAISCONJ' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'PERS_DATE_LETREC' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'PERS_DATE_REC' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'PERS_DATE_CONF' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'PERS_DATE_EFECHCONF' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,

            //
            'EMAIL' => $this->faker->unique()->freeEmail()
        ];
    }
}
