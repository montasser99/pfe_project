<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absence;
use App\Models\TypeFonction;
use App\Models\Natureagent;
use App\Models\H52MvtPointageBrut;
use App\Models\Conge;
use App\Models\DemandeConge;

class Personnel extends Model
{
    use HasFactory;

    protected $primaryKey = 'PERS_MAT_95';

    protected $fillable = [
        'PERS_MAT_95', 'PERS_MAT_ACT', 'PERS_NUMASS_94',
        'PERS_NATURAGENT_93', 'PERS_CODFONC_92', 'PERS_CODGROUP_92', 'PERS_CET_9', 'PERS_NOM_X40', 'PERS_NOM', 'PERS_PRENOM', 'EMAIL', 'PERS_SEXE_X', 'PERS_ETACIVIL_X', 'PERS_NJFILLE_X20', 'PERS_CODECHEFFAMIL_X', 'PERS_ENFANT_92', 'PERS_ENFSOC_9', 'PERS_ENFISC_9', 'PERS_DATE_NAIS', 'PERS_LNAIS_X16', 'PERS_PIDENTNUM_X13', 'PERS_PIDENT_DATE_EMIS', 'PERS_PIDENTLEMIS_X12', 'PERS_ADR_X60', 'PERS_TEL_98', 'PERS_CONDLOGE_9', 'PERS_NATION_X16', 'PERS_GSANG_X3', 'PERS_MONTALLFAM_95', 'PERS_MONTSALUNIQ_95', 'PERS_NOMCONJ_X40', 'PERS_DATE_NAISCONJ', 'PERS_LNAISCONJ_X16', 'PERS_NATIONCONJ_X16', 'PERS_PROFCONJ_X25', 'PERS_EMPLCONJ_X30', 'PERS_NUMLETREC_95', 'PERS_DATE_LETREC', 'PERS_DATE_REC', 'PERS_ECHELREC_92', 'PERS_CLASREC_X', 'PERS_CHELONREC_92', 'PERS_DATE_CONF', 'PERS_CLASCONF_X', 'PERS_DATE_EFECHCONF', 'PERS_ECHELCONF_92', 'PERS_QUALIF_X45', 'PERS_NUMCNSS_X16', 'PERS_NUMCNR_X10', 'PERS_SITAGEN_9', 'PERS_CATPERS_9', 'PERS_NATPERS_9', 'PERS_AFFECT_92', 'PERS_CENTRECOUT_94', 'PERS_ORDING_9', 'PERS_CODPAI_9', 'PERS_EXPERTISE_92', 'PERS_NUMCOMPT_X15', 'PERS_CODBANK_92', 'PERS_CODAGENC_93', 'PERS_SALBASE_96'
    ];

    public function absences()
    {
        return $this->hasMany(Absence::class, 'ABS_NUMORD_93', 'PERS_MAT_95');
    }
    public function users()
    {
        return $this->hasOne(User::class,'personnel_id','PERS_MAT_95');
    }

    public function typeFonction()
    {
        return $this->belongsTo(TypeFonction::class, 'PERS_CODFONC_92', 'CODE_TYPE');
    }

    public function natureAgents()
    {
        return $this->belongsTo(Natureagent::class, 'PERS_NATURAGENT_93', 'NATAG_CODE_93');
    }

    public function pointage()
    {
        return $this->hasMany(H52MvtPointageBrut::class, 'Matricule', 'PERS_MAT_95');
    }

    public function conges()
    {
        return $this->hasMany(Conge::class, 'CONG_NUMORD_93', 'PERS_MAT_95');
    }

    public function demandeconges()
    {
        return $this->hasMany(DemandeConge::class,'personnel_id','PERS_MAT_95');
    }

}
