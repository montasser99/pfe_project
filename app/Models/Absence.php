<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatAbs ;
use App\Models\Personnel ;


class Absence extends Model
{
    use HasFactory;

    protected $primaryKey = 'ABS_MAT_95';

    protected $fillable = ['ABS_MAT_95','ABS_NUMORD_93','ABS_NAT_9',
    'ABS_CET_9','ABS_DATE_DEB','ABS_PERDEB_X','ABS_DATE_FIN'
    ,'ABS_PERFIN_X','ABS_NBRJOUR_93','ABS_CUMULE_9'];

    public function natAbs()
    {
        return $this->belongsTo(NatAbs::class);
    }
    public function personnels()
    {
        return $this->belongsTo(Personnel::class);
    }
}
