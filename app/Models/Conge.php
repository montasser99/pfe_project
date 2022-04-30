<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatureConge;
use App\Models\Personnel;

class Conge extends Model
{
    use HasFactory;

    protected $primaryKey = 'CONG_MAT_95';

    protected $fillable = ['CONG_NUMORD_93', 'CONG_NAT_9', 'CONG_MOTIF_X40','CONG_CET_9',
    'CONG_ANCSOLD_93','CONG_NBRJOUR_93','CONG_NOVSOLD_93','CONG_DATE_DEB','CONG_PERDEB_X','CONG_DATE_FIN',
    'CONG_PERFIN_X','CONG_INTERIM_X20','CONG_ADRES_X30','CONG_TEL_98','CONG_DEMI_PER'];

    public function nature_conges()
    {

        return $this->belongsTo(NatureConge::class, 'CONG_NAT_9', 'CODE');
    }
    public function personnels()
    {

        return $this->belongsTo(Personnel::class, 'CONG_NUMORD_93', 'PERS_MAT_95');
    }
}
